<?php echo 'timeline'; ?>


 <script>
$(function() {
$( "#datepicker" ).datepicker();
});


</script>



<p>Date: <input type="text" id="datepicker"></p>


<textarea name="contenu" id="contenu" placeholder="contenu" value="" style="width:590px; height:400px;"></textarea>
   <script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace( 'contenu' );
</script>
