                <?php
                $servername = "localhost";
                $dBUsername = "root";
                $dBpassword = "";
                $dBname = "test2";

                $conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);
                $s = mysqli_query($conn, "SELECT * FROM categories");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                ?>

                <select id="category_id" name="category_id">
                    <?php

                    while ($r = mysqli_fetch_array($s)) {
                    ?>

                        <option value="<?= $r['category_id'] ?>"><?php echo $r['category_name']; ?></option>


                    <?php

                    }
                    ?>
                </select>




                <?php
                //if (isset($_GET['category_name'])) {
                // $categoryname = $_GET['category_name'];

                // else {
                //mysqli_free_result($res);
                //}
                //else {
                //echo "ERROR:could not execute $sql." . mysqli_error($conn);
                //}
                //}
                // $selected = "Other";
                //$options = array('Breakfast', 'Lunch', 'Other');
                //echo "<select>";
                //foreach ($options as $option) {
                // if ($selected == $option) {
                //  echo "<option selected='selected' value='$option'>$option</option>";
                //}
                //echo "<option value='$option'>$option</option>";
                //}
                //echo "</select>";
                ?>