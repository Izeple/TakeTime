<?php $id = $_GET["id"]; ?>

    <html>
      <form id='form1' name='myform' action='booking_2.php' method='POST' >
        <input type='text' value='<?php echo $id; ?>' name='id' hidden />
        <input type='submit' name='myform' />
      </form>


      <script type="text/javascript">
        document.getElementById('form1').submit(); // SUBMIT FORM
      </script>
    </html>