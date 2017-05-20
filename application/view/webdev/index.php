<div class="container">
    <div class="box">
        <h3>Add a student</h3>
        <form action="<?php echo URL; ?>webdev/addstudent" method="POST">
            <label>Name</label>
            <input type="text" name="name" value="" required />
            <label>Number</label>
            <input type="number" name="number" value="" required />
            <label>Richting</label>
            <input type="text" name="richting" value="" />
            <input type="submit" name="submit_add_student" value="Submit" />
        </form>
    </div>
    
    <div class="box">
        <h3>List of Students</h3>
        <table style="width: 100%;">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Number</td>
                <td>Richting</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student) { ?>
                <tr>
                    <td><?php if (isset($student->id)) echo htmlspecialchars($student->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($student->name)) echo htmlspecialchars($student->name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($student->number)) echo htmlspecialchars($student->number, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($student->richting)) echo htmlspecialchars($student->richting, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'webdev/deletestudent/' . htmlspecialchars($student->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'webdev/editstudent/' . htmlspecialchars($student->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <table style="width: 100%;">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Username</td>
                <td>Password</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php if (isset($user->id)) echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->username)) echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->password)) echo htmlspecialchars($user->password, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
