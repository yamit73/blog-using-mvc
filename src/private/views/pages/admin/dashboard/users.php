<?php
global $settings;
?>
<h2>Users</h2>
<div class="table-responsive">
    <table class="table table-sm">
        <thead class="bg-dark text-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Change Role</th>
                <th scope="col">Login Permission</th>
                <th scope="col">Login/Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $row='';
            foreach ($data as $val) {
                if ($val['role']!='admin') {
                    $row .= '<tr>
                            <th scope="row">'.$val['id'].'</th>
                            <td>'.$val['name'].'</td>
                            <td>'.$val['email'].'</td>
                            <td>'.$val['role'].'</td>';

                    if ($val['role']=='writer') {
                        $row .= '<td><a href="'.$settings['siteurl'].'/admin/changeRole&currentSection=users&newRole=reader&userId='.$val['id'].'" class="btn-sm btn-warning">reader</a></td>';
                    } elseif ($val['role']=='reader') {
                        $row .= '<td><a href="'.$settings['siteurl'].'/admin/changeRole&currentSection=users&newRole=writer&userId='.$val['id'].'" class="btn-sm btn-success">writer</a></td>';
                    }

                    $row.='<td>'.$val['permission'].'</td>';

                    if ($val['permission']=='approved') {
                        $row .= '<td><a href="'.$settings['siteurl'].'/admin/changePermission&currentSection=users&newPer=restricted&userId='.$val['id'].'" class="btn-sm btn-danger">restrict</a></td>';
                    } else {
                        $row .= '<td><a href="'.$settings['siteurl'].'/admin/changePermission&currentSection=users&newPer=approved&userId='.$val['id'].'" class="btn-sm btn-success">Approve</a></td>';
                    }
                }
                
                $row.='</tr>';
            }
            echo $row;
            ?>
            
        </tbody>
    </table>
</div>