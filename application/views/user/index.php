<section>
    <h2>Users</h2>
    <?php echo anchor('user/create','<i class="fa fa-plus"></i>'); ?>
</section>
<table class="table table-stripped">
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>email</td>
        <td>User Type</td>
        <td colspan="2">Action</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['user_id'];?></td>
            <td><?php echo $user['first_name'];?></td>
            <td><?php echo $user['email'];?></td>
            <td><?php echo $user['user_type_id'];?></td>
            <td><a class="btn btn-info text-center" style="padding: 15px" href="user/edit/<?php echo $user['user_id'];?>"><i class="fa fa-edit"></i></a>
            <a class="btn btn-info" style="padding: 15px" href="user/edit/<?php echo $user['user_id'];?>"><i class="fa fa-remove"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>