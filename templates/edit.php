<?php include "inc/header.php"; ?>

        <section>
          <div class="container">
            <div class="edit-entry">
              <h2>Edit Entry</h2>
              <form>
                <label for="title"> Title</label>
                <input type="text" name="title"><br>
                <label for="entry">Entry</label>
                <textarea rows="5" name="entry"></textarea>
                <input type="submit" value="Save Entry" class="button">
                <a href="#" class="button button-secondary">Cancel</a>
              </form>
            </div>
          </div>
        </section>

<?php include "inc/footer.php"; ?>
