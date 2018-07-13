<?php
$title = 'VGHS - Add a Review';

include('header.php');


$title = 'VGHS - Upload image';
require_once('dbconfig.php');

?>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <form action="addReviewAction.php" method="post" enctype="multipart/form-data" id="form1">
            <h1>Add Review</h1>
            <div class="form-group">
            <div>
                <label for="review_title">Title</label>
                <input type="text" name="review_title" class="form-control">
            </div>
            <div>
                <label for="review_name">Game</label>
            </div>
            <div class="form-group d-flex">
                <select name="review_name" class="form-control">
                   <option value="null">Select Game</option>
                    <?php
                        //Prepare sql query string
                        $sql = "SELECT game_id,game_name FROM games";
                        $result = $conn->query($sql);
                        //Loop through the results and create options for the select menu
                        while($row = $result->fetch_array()){
                            echo '<option value="'.$row['game_name'].'">'.$row['game_name'].'</option>';
                        }
                    ?>
                </select>
                <button type="button" class="btn btn-primary"><a style="color: white;" href="addGame.php">Add a Game</a></button>
                </div>

                <div>
                    <label for="review_platform">Platform</label>
                </div>
                <div class="form-group d-flex">
                    <select name="review_platform" class="form-control">
                        <option value="No platform set">Select Platform</option>
                            <?php
                                //Prepare sql query string
                                $sql = "SELECT console_id,console_name FROM consoles";
                                $result = $conn->query($sql);
                                //Loop through the results and create options for the select menu
                                while($row = $result->fetch_array()){
                                    echo '<option value="'.$row['console_name'].'">'.$row['console_name'].'</option>';
                                }
                            ?>
                    </select>
                    <button type="button" class="btn btn-primary"><a style="color: white;" href="addConsole.php">Add a Console</a></button>

                </div>
                <label for="review_image">Thumbnail</label>
                <input type="file" name="file" class="form-control">
            </div>            
            
            
            
            <label for="review_review">Review</label>
            <div id="editor-container">
            </div>

<!--                <textarea type="text" name="review_review" style="height: 200px;" class="form-control"></textarea>-->
            <div>
                <label for="review_rating">Rating</label>
                <select name="review_rating" class="form-control">
                    <option value="1">Select rating (1 being lowest)</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div> <br>
            <button type="submit" name="submit" class="btn btn-success">Upload</button>
            
            <input type="hidden" name="review_review" id="review_review">
        </form>
    </div>
    <script>
var quill = new Quill('#editor-container', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
    ]
  },
  placeholder: 'Write your review here..',
  theme: 'snow'  // or 'bubble'
});

document.getElementById('form1').addEventListener('submit',function(e){
document.getElementById('review_review').value = quill.container.firstChild.innerHTML; 
  document.getElementById('form1').submit();
});

</script>

    
<?php include('footer.php');