
<!DOCTYPE html>
<html>
 <head>
  <title>Dropdown List using Jquery and Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 >Dropdown List using Jquery and Ajax</h2><br /><br />
   <select name="district" id="district" class="form-control input-lg">
    <option value="">Select distrit</option>
   </select>
   <br />
   <select name="taluk" id="taluk" class="form-control input-lg">
    <option value="">Select taluk</option>
   </select>
   <br />
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 load_json_data('district');

 function load_json_data(id, parent_id)
 {
  var html_code = '';
  $.getJSON('country_state_city.json', function(data){

   html_code += '<option value="">Select '+id+'</option>';
   $.each(data, function(key, value){
    if(id == 'district')
    {
     if(value.parent_id == '0')
     {
      html_code += '<option value="'+value.id+'">'+value.name+'</option>';
     }
    }
    else
    {
     if(value.parent_id == parent_id)
     {
      html_code += '<option value="'+value.id+'">'+value.name+'</option>';
     }
    }
   });
   $('#'+id).html(html_code);
  });

 }

 $(document).on('change', '#district', function(){
  var district_id = $(this).val();
  if(district_id != '')
  {
   load_json_data('taluk', district_id);
  }
  else
  {
   $('#taluk').html('<option value="">Select taluk</option>');
  
  }
 });
 
});
</script>