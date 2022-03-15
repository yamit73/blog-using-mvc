<?php
global $settings;
?>
<h2>My Profile</h2>
<div class="table-responsive">
    <table class="table table-sm">
        <thead class="bg-dark text-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                echo'<tr>
                        <th scope="row">'.$data['id'].'</th>
                        <td>'.$data['name'].'</td>
                        <td>'.$data['email'].'</td>
                    </tr>';
                
            ?>
            
        </tbody>
    </table>
</div>