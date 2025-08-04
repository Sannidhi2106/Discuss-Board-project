<select class="form-control" name="category" id="category">
    <option value="">Select A Category</option>
    <?php 
    include("./common/db.php"); // the below query because what we inserted in that datbase that we are fetcching and 
    // displaying on the UI ok.
    $query="select * from category"; 
    $result=$conn->query($query);
    foreach($result as $row){
        $name= ucfirst($row['name']); // for capital letter that  we have been stored na ,it should ne in the capital letter

         $id= $row['id'];
       echo  "<option value=$id>$name</option>";
    }
    ?>
</select>