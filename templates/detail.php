<?php include "../inc/header.php"; ?>

        <section>
          <div class="container">
            <div class="entry-list single">
              <article>
                <h1>The best day I’ve ever had</h1>
                <time datetime="2016-01-31 1:00">January 31, 2016 at 1:00</time>
                <div class="entry">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut rhoncus felis, vel tincidunt neque. Vestibulum ut metus eleifend, malesuada nisl at, scelerisque sapien. Vivamus pharetra massa libero, sed feugiat turpis efficitur at.</p>
                  <p>Cras egestas ac ipsum in posuere. Fusce suscipit, libero id malesuada placerat, orci velit semper metus, quis pulvinar sem nunc vel augue. In ornare tempor metus, sit amet congue justo porta et. Etiam pretium, sapien non fermentum consequat, <a href="">dolor augue</a> gravida lacus, non accumsan lorem odio id risus. Vestibulum pharetra tempor molestie. Integer sollicitudin ante ipsum, a luctus nisi egestas eu. Cras accumsan cursus ante, non dapibus tempor.</p>
                  <p><a class="link" href="edit.html">Edit Entry</a></p>
                </div>
              </article>
            </div>
          </div>
        </section>
        <section class="entry-comments">
          <div class="container">
            <h2>Comments</h2>
            <div class="comment">
              <strong>Carling Kirk</strong>
              <time datetime="2016-01-31 1:00">January 31, 2016 at 1:00</time>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut rhoncus felis, vel tincidunt neque. Vestibulum ut metus eleifend, malesuada nisl at, scelerisque sapien. Vivamus pharetra massa libero, sed feugiat turpis efficitur at.</p>
            </div>
            <div class="new-comment">
              <form>
                <label for="name"> Name</label>
                <input type="text" name="name"><br>
                <label for="comment">Comment</label>
                <textarea rows="5" name="comment"></textarea>
                <input type="submit" value="Post Comment" class="button">
              </form>
            </div>
          </div>
        </section>

<?php include "../inc/footer.php"; ?>
