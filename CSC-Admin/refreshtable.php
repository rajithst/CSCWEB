<?php

include 'components/ad_head.php';
require '../classes/Admin/Retrieve.php';




echo "<div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>Edit Users</h3>
                </div>";

                $users = new Retrieve();
                $result= $users->allUsers();
                while($row = $result->fetch_array()) {
                    echo "<div class='panel-body list-group list-group-contacts'>
                        <a href='#' class='list-group-item'>";
                           echo " <img src=' $row[8]' class='pull-left' alt='Nadia Ali'/>
                            <span class='contacts-title'>$row[1] $row[2]</span>
                            <p> $row[7]</p>
                            <div class='list-group-controls'>
                                <button class='btn btn-warning edit' id='$row[0]'><span class='fa fa-pencil'></span></button>
                                <button class='btn btn-danger delete' id='$row[0]'><span class='fa fa-minus'></span></button>
                            </div>
                        </a>
                    </div>";
              }
echo "</div>";