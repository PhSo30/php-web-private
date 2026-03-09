<div class="container">
    <div class="d-flex justify-content-between">
    <h3>List User</h3>
    <a class="btn btn-success" href="./?page=user/create" role="button">Create new</a>
    </div>

    <div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
        </tr>
        <?php
        $users = getUsers();
        $count = 1;
        while($row = $users->fetch_object()){
            $photo = $row->photo ?? './assets/images/emptyuser.png';
            
            echo '<tr>
                    <th>' . $count . '</th>
                    <th> <img src="' .  $photo . '" class="rounded img-thumbnail" style="max-width:200px"></img></th>
                    <th>' . $row->name . '</th>
            
            </tr>';
            $count++;
        }
        ?>
    </table>
    </div>
</div>