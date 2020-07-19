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
                <a class="btn " data-toggle="modal" data-target="#myModaljor">Add Journals</a>

                <!-- <a class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>
                    Filter</a> -->
            </div>
            <table id="example3" class="table display">
                <thead>
                    <!-- <tr class="filters"> -->
                    <th><input type="text" class="form-control" placeholder="S.No" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Journal ID" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Book Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Book Author" disabled></th>
                    <th><input type="text" class="form-control" placeholder="No of copies" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Available copies" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Add copies" disabled /></th>
                    <th>Delete</td>
                        <!-- </tr> -->
                </thead>
                <tbody>
                    <?php
                    include 'db.php';
                    $getbooks = mysqli_query($con, "SELECT *,(SELECT COUNT(BookGuid) from `booksdata` where BookName = `bookdata`.`BookId`) AS total,(SELECT COUNT(BookGuid) from `booksdata` where BookName = `bookdata`.`BookId` && STATUS = false) AS available from `bookdata` where type = 2");
                    $cou = mysqli_query($con, "SELECT COUNT(*) from `bookdata` where type = 2");
                    $cou = mysqli_fetch_array($cou)[0];
                    if($cou > 3000){
                        set_time_limit(120);
                    }
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($getbooks)) {
                        $bbid = $row['BookId'];
                        $adddata = mysqli_query($con, "SELECT * from `joraddinfo` where BookId = '$bbid'");
                        $row1 = mysqli_fetch_array($adddata, MYSQLI_ASSOC);
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['BookId'] ?></td>
                            <td><?php echo $row['BookName'] ?></td>
                            <td><?php echo $row['edition'] ?></td>
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
<div class="modal" id="myModaljor">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Journals</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="insertJornals.php">
                    <!-- <div class="form-group">
                        <label for="til">Title</label>
                        <input type="text" name="til" class="form-control" placeholder="Enter Title" id="til">
                    </div> -->

                    <div class="form-group">
                        <label for="name">Journal name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Journal name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="preE">Periodicity</label>
                        <input type="text" name="preE" class="form-control" placeholder="Periodicity" id="preE">
                    </div>
                    <div class="form-group">
                        <label for="pus">Publisher</label>
                        <input type="text" name="pus" class="form-control" placeholder="Publisher" id="pus" required>
                    </div>
                    <div class="form-group">
                        <label for="SubNo">Subscription Number</label>
                        <input type="text" name="SubNo" class="form-control" placeholder="Subscription Number" id="SubNo" required>
                    </div>
                    <div class="form-group">
                        <label for="adt">And Date</label>
                        <input type="text" name="adt" class="form-control" placeholder="And Date" id="adt" required>
                    </div>
                    <div class="form-group">
                        <label for="fdt">Foundation Date</label>
                        <input type="text" name="fdt" class="form-control" placeholder="Foundation Date" id="fdt" required>
                    </div>
                    <div class="form-group">
                        <label for="Subanm">Subscription per Annum Rs.</label>
                        <input type="text" name="Subanm" class="form-control" placeholder="Subscription per Annum Rs." id="Subanm" required>
                    </div>
                    <div class="form-group">
                        <label for="frmto">From - TO</label>
                        <input type="text" name="frmto" class="form-control" placeholder="From - TO" id="frmto" required>
                    </div>
                    <div class="form-group">
                        <label for="pervol">Issue's per Volume</label>
                        <input type="text" name="pervol" class="form-control" placeholder="Issue's per Volume" id="pervol" required>
                    </div>
                    <div class="form-group">
                        <label for="dop">Date of Pubilished</label>
                        <input type="text" name="dop" class="form-control" placeholder="Enter Date of Pubilished" id="dop" required>
                    </div>
                    <div class="form-group">
                        <label for="mop">Month of Pubilished</label>
                        <input type="text" name="mop" class="form-control" placeholder="Enter Month of Pubilished" id="mop" required>
                    </div>
                    <div class="form-group">
                        <label for="yop">Year of Pubilished</label>
                        <input type="text" name="yop" class="form-control" placeholder="Enter Year of Pubilished" id="yop" required>
                    </div>
                    <div class="form-group">
                        <label for="volume">Volume</label>
                        <input type="text" name="volume" class="form-control" placeholder="Enter Volume" id="volume" required>
                    </div>
                    <div class="form-group">
                        <label for="num">Number</label>
                        <input type="text" name="num" class="form-control" placeholder="Enter >Number" id="num" required>
                    </div>
                    <div class="form-group">
                        <label for="dor">Date of Received</label>
                        <input type="text" name="dor" class="form-control" placeholder="Enter Date of Received" id="dor">
                    </div>
                    <div class="form-group">
                        <label for="ond">Order Number & Date</label>
                        <input type="text" name="ond" class="form-control" placeholder="Enter Order Number & Date" id="ond" required>
                    </div>
                    <div class="form-group">
                        <label for="ddnd">DD Number & Date</label>
                        <input type="text" name="ddnd" class="form-control" placeholder="Enter DD Number & Date" id="ddnd" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount" id="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="lii">Librarians's Initials</label>
                        <input type="text" name="lii" class="form-control" placeholder="Enter Librarians's Initials" id="lii">
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" name="remarks" class="form-control" placeholder="Enter Remarks" id="remarks">
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
        var table = $('#example3').DataTable({
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