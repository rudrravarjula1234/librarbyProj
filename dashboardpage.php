<style>
    #copies {
        display: flex;
        flex-direction: row;
    }
</style>
<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <a class="btn " data-toggle="modal" data-target="#myModal">Add Books</a>

                <a class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>
                    Filter</a>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="S.No" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Accession Number" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Call Number" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Book Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Book Author" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Book ID" disabled></th>

                        <th><input type="text" class="form-control" placeholder="No of copies" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Available copies" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Add copies" disabled /></th>
                        <th>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db.php';
                    $getbooks = mysqli_query($con, "SELECT *,(SELECT COUNT(BookGuid) from `booksdata` where BookName = `bookdata`.`BookId`) AS total,(SELECT COUNT(BookGuid) from `booksdata` where BookName = `bookdata`.`BookId` && STATUS = false) AS available from `bookdata` where 1");
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($getbooks)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['BookName'] ?></td>
                            <td><?php echo $row['Author'] ?></td>
                            <td><?php echo $row['BookId'] ?></td>
                            <td><?php echo $row['total'] ?></td>
                            <td><?php echo $row['available'] ?></td>
                            <td>
                                <form method="post" id="copies" action="addcopies.php" target="_blank">
                                    <input type="hidden" name="bid" value="<?php echo $row['BookId'] ?>">
                                    <input type="hidden" name="bname" value="<?php echo $row['BookName'] ?>">
                                    <input type="number" class="form-control copyy" name="copy">
                                    <input type="submit" value="Add" name="add" class="btn addd" style="margin-left:5px" disabled>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="deletebook.php">
                                    <input type="hidden" value="<?php echo $row['BookId'];  ?>" name="books" />
                                    <input class="btn" type="submit" value="Delete" />
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Books</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="insertbooks.php">
                    <div class="form-group">
                        <label for="Bname">Date</label>
                        <input type="text" name="bname" class="form-control" placeholder="Enter Date" id="Bname">
                    </div>
                    <div class="form-group">
                        <label for="Author">Accession Number</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter Accession Number" id="Author">
                    </div>
                    <div class="form-group">
                        <label for="sub">Call Number</label>
                        <input type="text" name="subb" class="form-control" placeholder="Enter Call Number" id="sub">
                    </div>
                    <div class="form-group">
                        <label for="Bname">Title of the book</label>
                        <input type="text" name="bname" class="form-control" placeholder="Enter Title of the book" id="Bname">
                    </div>
                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter Author Name" id="Author">
                    </div>
                    <div class="form-group">
                        <label for="sub">Source</label>
                        <input type="text" name="subb" class="form-control" placeholder="Enter Source" id="sub">
                    </div>
                    <div class="form-group">
                        <label for="Bname">Invoice Number & Date</label>
                        <input type="text" name="bname" class="form-control" placeholder="Invoice Number & Date" id="Bname">
                    </div>
                    <div class="form-group">
                        <label for="Author">Publisher & Place o Publication</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter Publisher & Place o Publication" id="Author">
                    </div>
                    <div class="form-group">
                        <label for="sub">Year of Publication</label>
                        <input type="text" name="subb" class="form-control" placeholder="Enter Year of Publication" id="sub">
                    </div>
                    <div class="form-group">
                        <label for="Bname">Pages</label>
                        <input type="text" name="bname" class="form-control" placeholder="Enter Number of Pages" id="Bname">
                    </div>
                    <div class="form-group">
                        <label for="Author">Book Size</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter Book Size" id="Author">
                    </div>
                    <div class="form-group">
                        <label for="sub">Edition</label>
                        <input type="text" name="subb" class="form-control" placeholder="Enter Edition" id="sub">
                    </div>
                    <div class="form-group">
                        <label for="Bname">Cost</label>
                        <input type="text" name="bname" class="form-control" placeholder="Enter Cost of the Book" id="Bname">
                    </div>
                    <div class="form-group">
                        <label for="Author">Remarks</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter Remarks" id="Author">
                    </div>
                    <!-- <div class="form-group">
                        <label for="sub">Subject</label>
                        <input type="text" name="subb" class="form-control" placeholder="Enter Subject" id="sub">
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
                    </div> -->

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
        $('.copyy').on('input', function() {
            $($(this).parent().context.nextElementSibling).removeAttr("disabled");
            var a = console.log($(this).parent().context.nextElementSibling);
            console.log();
            console.log(($('#copyy').val()));
        });
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
    });
</script>