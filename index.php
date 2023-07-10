<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Stocks</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-striped">
                <colgroup>
                    <col width="5%">
                    <col width="20%">
                    <col width="20%">
                    <col width="40%">
                    <col width="15%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>stock id</th>
                        <th>name</th>
                        <th>Supplier</th>
                        <th>description</th>
                        <th>Available Stocks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    $qry = $conn->query("SELECT i.*, s.name AS supplier FROM `item_list` i INNER JOIN supplier_list s ON i.supplier_id = s.id ORDER BY `name` DESC");
                    while ($row = $qry->fetch_assoc()) {
                        $in = $conn->query("SELECT SUM(quantity) AS total FROM stock_list WHERE item_id = '{$row['id']}' AND type = 1")->fetch_array()['total'];
                        $out = $conn->query("SELECT SUM(quantity) AS total FROM stock_list WHERE item_id = '{$row['id']}' AND type = 2")->fetch_array()['total'];
                        $row['Available Stock'] = $in - $out;
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo "stock " . $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['supplier'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo isset($row['cost']) ? $row['cost'] : ""; ?></td>
                            <td class="text-right"><?php echo number_format($row['Available Stock']) ?></td>
                            <!-- <td class="text-right"><?php echo number_format($row['Quantity']) ? $row['Quantity'] : "None"; ?></td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- report -->
<button class="btn btn-primary" onclick="generateReport()">Generate Report</button>

<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            _conf("Are you sure to delete this Received Orders permanently?", "delete_receiving", [$(this).attr('data-id')]);
        });

        $('.view_details').click(function(){
            uni_modal("Receiving Details", "receiving/view_receiving.php?id=" + $(this).attr('data-id'), 'mid-large');
        });

        $('.table td, .table th').addClass('py-1 px-2 align-middle');
        $('.table').dataTable();
    });

    function delete_receiving($id){
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=delete_receiving",
            method: "POST",
            data: {id: $id},
            dataType: "json",
            error: err => {
                console.log(err);
                alert_toast("An error occurred.", 'error');
                end_loader();
            },
            success: function(resp){
                if (typeof resp == 'object' && resp.status == 'success') {
                    location.reload();
                } else {
                    alert_toast("An error occurred.", 'error');
                    end_loader();
                }
            }
        });
    }

    function generateReport(){
        // Create a new window for the report
        var reportWindow = window.open("", "_blank");
        
        // Start building the HTML content for the report
        var reportContent = "<html><head><title>Stock Report</title>";
        reportContent += "<style>body { background-color: #f2f2f2; }</style>";
        reportContent += "</head><body>";
        reportContent += "<table width='100%' height='100%'>";
        reportContent += "<tr><td align='center'>";
        reportContent += "<div style='background-color: grey; padding: 20px;'>";
        reportContent += "<h2 style='color: white;'>Stock Report</h2>";
        reportContent += "<table>";
        reportContent += "<thead><tr><th>#</th><th>Item Name</th><th>Supplier</th><th>Description</th><th>Available Stocks</th></tr></thead>";
        reportContent += "<tbody>";
        
        // Loop through the table rows and add them to the report
        $(".table tbody tr").each(function(index){
            var rowData = $(this).find("td");
            var rowNumber = rowData.eq(0).text();
            var itemName = rowData.eq(1).text();
            var supplier = rowData.eq(2).text();
            var description = rowData.eq(3).text();
            var availableStocks = rowData.eq(4).text();
            
            reportContent += "<tr><td>" + rowNumber + "</td><td>" + itemName + "</td><td>" + supplier + "</td><td>" + description + "</td><td>" + availableStocks + "</td></tr>";
        });
        
        // Finish building the HTML content for the report
        reportContent += "</tbody></table>";
        reportContent += "<button onclick='window.print()' style='background-color: #4caf50; color: white; padding: 10px; border: none; cursor: pointer;'>Print</button>";
        reportContent += "</div>";
        reportContent += "</td></tr></table>";
        reportContent += "</body></html>";
        
        // Write the HTML content to the new window
        reportWindow.document.open();
        reportWindow.document.write(reportContent);
        reportWindow.document.close();
    }
</script>
