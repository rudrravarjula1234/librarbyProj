
<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <button class="btn " data-toggle="modal" data-target="#myModal1">Add</button>
                <button class="btn " >Generate BarCode</button>
                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>
                    Filter</button>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Student Id" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Studetn Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Group" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Books Taken" disabled></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        include 'db.php';
                        $getbooks = mysqli_query($con,"SELECT * FROM `stddataa` where 1");
                        $i = 1;
                        while($row = mysqli_fetch_assoc($getbooks)){
                    ?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $row['stdid'] ?></td>
                            <td><?php echo $row['stdname'] ?></td>
                            <td><?php echo $row['group'] ?></td>
                            <td><?php echo $row['Books'] ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Students</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="insertstd.php">
                    <div class="form-group">
                        <label for="Sname">Student Name</label>
                        <input type="text" name="sname" class="form-control" placeholder="Enter Student Name" id="Sname" >
                    </div>
                    <div class="form-group">
                        <label for="rnum">Roll Number</label>
                        <input type="text" name="rnum" class="form-control" placeholder="Enter Student iD" id="rnum">
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
});
</script>