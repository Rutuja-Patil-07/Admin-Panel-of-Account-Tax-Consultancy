var a=false;
$(document).ready(function(){
$("#btn_save").click(function(){
  if(a==false){
    
    saveperform();
   }
  }); 
});


 function saveperform() 
{ 
    var emp_name=$('#emp_name').val();
    var mobile=$('#mobile').val();
    var email=$('#email').val();
    var usertype=$('#usertype').val();
    var username=$('#username').val();
    var password=$('#password').val();
    var department=$('#department').val();
    var address=$('#address').val();
    var qualification=$('#qualification').val();
    var joindate=$('#joindate').val();
    var photo=$('#photo').val();
    var smobile=$('#smobile').val();
    var pincode=$('#pincode').val();
    var gender=$('#gender').val();
    var country=$('#country').val();
    var state=$('#state').val();
    var district=$('#district').val();
    var taluka=$('#taluka').val();
    var village=$('#village').val();
    var lic_info=$('#lic_info').val();
    var licence_no=$('#licence_no').val();
    var startdate=$('#startdate').val();
    var expirydate=$('#expirydate').val();
    var warning=$('#warning').val();
   
    if(emp_name==""||mobile==""||email==""||usertype==""||username==""||password==""||department==""||address==""||qualification==""||joindate==""||photo==""||smobile==""||pincode==""||gender==""||country==""||state==""||district==""||taluka==""||village==""||lic_info==""||licence_no==""||startdate==""||expirydate==""||warning=="") 
    {
      // alert("requird");
        swal({
        title:"",
        text:"Please Enter Required Fields",
        type:"error",           
    });   
  }

    // else
    // {
    // 	if(userId>0)
    	// {
      //       a=true;
    	
    		// $.ajax({
      //   url:base_path+"Country/updateCountry",
      //   type: "POST",
      //   data: $('#Form').serialize(),
      //    beforeSend: function(){
      //          $('#btn_save').prop('disabled', true);
      //          $('#btn_save').html('Loading');
      //     }, 
      //   success: function(data) {
      //      $('#btn_save').prop('disabled', false);
      //      $('#btn_save').html('<img src="'+base_path+'assets/images/save.png" width="21"> Save');
             
      //       swal({
      //       title:"",
      //       text:"Data Submitted Successfully",
      //       type:"success",
      //       showCancelButton: true, 
      //       showConfirmButton: false,
      //       timer:10000
      //   }); a=false;
      //       window.location.href = base_path+"Country";
      //     }
      // });
    	// }
        else
    	{a=true;
    		//alert('insert');
    		$.ajax({
        url:base_path+"Employee/insertEmployee",
        type: "POST",
        data: $('#Form').serialize(),
         beforeSend: function(){
               $('#btn_save').prop('disabled', true);
               $('#btn_save').html('Loading');
          }, 
        success: function(data) {

            $('#btn_save').prop('disabled', false);
           $('#btn_save').html('Save');
             $("#Form").trigger("reset");

             // alert("hi");
          swal({
            title:"",
            text:"Data Submitted Successfully",
            type:"success",
            showCancelButton: false, 
            showConfirmButton: false,
             width: '1000px',
            timer:1000
        });
           $('#Form').parsley().destroy();
           $('#Form').parsley();
           a=false;

                }
      });
    	}
      }
 // }
