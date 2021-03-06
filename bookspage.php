<head>
    <script type="text/javascript">
        function stopRKey(evt) {
            var evt = (evt) ? evt : ((event) ? event : null);
            var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
            if ((evt.keyCode == 13) && (node.type == "text")) {
                return false;
            }
        }

        document.onkeypress = stopRKey;
    </script>
</head>
<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <form method="post" action="barCodeGen.php" target="_blank">
                <div class="panel-heading">
                    <input class="btn" type="submit" value="Generate BarCode" name="gen" />
                    <input class="btn" type="submit" value="Delete" name="remove" />

                    <a class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>
                        Filter</a>
                </div>
                <table id="example1" class="table display" style="overflow-x:auto">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Check_Box" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Acession_Number" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Call_Number" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Title_of_the_Book" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Author" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Source" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Invoice_Number_&_Date" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Publisher_&_Place_of_Publication" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Year_of_Publication" disabled></th>
                            <th><input type="text" class="form-control" placeholder="No.Pages" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Book_Size" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Edition" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Cost" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Status" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Remarks" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Barcode" disabled></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'db.php';
                        $getbooks = mysqli_query($con, "SELECT * FROM `booksdata` AS t1 JOIN `bookdata` AS t2 ON t1.BookName = t2.BookId
                        where t2.type = 1");
                        $cou = mysqli_query($con, "SELECT COUNT(*) from `booksdata` AS t1 JOIN `bookdata` AS t2 ON t1.BookName = t2.BookId
                        where t2.type = 1");
                        $cou = mysqli_fetch_array($cou)[0];
                        if($cou > 3000){
                            set_time_limit(120);
                        }
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($getbooks)) {
                            $bbid = $row['BookId'];
                            $adddata = mysqli_query($con, "SELECT * from `booksaddinfo` where BookId = '$bbid'");
                            $row1 = mysqli_fetch_array($adddata, MYSQLI_ASSOC);
                        ?>
                            <tr>
                                <td><input type="checkbox" name="barcodes[]" value="<?php echo $row['BookGuid'] ?>" /></td>
                                <td><?php echo $row1['date'] ?></td>
                                <td><?php echo $row['sno'] ?></td>
                                <td><?php echo $row1['call_num'] ?></td>
                                <td><input type="hidden" value="<?php echo $row['BookName'] ?>" name="var[]"><?php echo $row['BookName'] ?></td>
                                <td><?php echo $row1['author'] ?></td>
                                <td><?php echo $row1['source'] ?></td>
                                <td><?php echo $row1['invoice_num'] ?></td>
                                <td><?php echo $row1['pandp'] ?></td>
                                <td><?php echo $row1['yearofpub'] ?></td>
                                <td><?php echo $row1['pages'] ?></td>
                                <td><?php echo $row1['booksize'] ?></td>
                                <td><?php echo $row['edition'] ?></td>
                                <td><?php echo $row1['cost'] ?></td>
                                <td><?php echo $row['status'] ? "Not Available" : "Available" ?></td>
                                <td><?php echo $row1['remarks'] ?></td>
                                <td><?php echo $row['BookGuid'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Students</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="insertbooks.php">
                    <div class="form-group">
                        <label for="Sname">Student Name</label>
                        <input type="text" name="sname" class="form-control" placeholder="Enter Book Name" id="Sname">
                    </div>
                    <div class="form-group">
                        <label for="rnum">Roll Number</label>
                        <input type="text" name="rnum" class="form-control" placeholder="Enter Author Name" id="rnum">
                    </div>
                    <div class="form-group">
                        <label for="dept">Department</label>
                        <select class="form-control" name="dept" id="dept">
                            <option>ECE</option>
                            <option>CSE</option>
                            <option>IT</option>
                            <option>EEE</option>
                            <option>MECH</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.filterable .btn-filter').click(function() {

            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function(e) {
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function() {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table
                    .find('.filters th').length + '">No result found</td></tr>'));
            }
        });

        var table = $('#example1').DataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    // $('input', this.footer()).on('keyup change clear', function() {
                    //     if (that.search() !== this.value) {
                    //         that
                    //             .search(this.value)
                    //             .draw();
                    //     }
                    // });
                });
            }
        });

    });
</script>