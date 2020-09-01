var selectedYear="";
var selectedCategory="";

function get_all_jobs()
{
    let formData = new FormData();
	let url = baseUrl+"job/get_all_jobs";
	let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let thead = '<thead class="thead-light">'+
            '   <tr>'+
            '      <th scope="col">S.No</th>'+
            '   </tr>'+
            '</thead>';
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            if(!status)
             {
                 $(".error_message").text(message);
                 $(".error_message").css("color","red");
                 return false;	                
             } 
             let vacancies_list = '';
             let data = obj.data; 
             for (var i = 0; i < data.length; i++) {
                vacancies_list = vacancies_list+  '<tr><th><div class="mb-5">'+
                '   <a href="#" class="list-group-item light-bg">'+
                '      <div class="media col-md-1 pt-5">'+
                '         <i class="fa fa-heart-o fa-2x"></i>'+
                '      </div>'+
                '      <div class="media col-md-2">'+
                '         <img src="assets/images/icon2.jpg">'+
                '      </div>'+
                '      <div class="col-md-6 carrer-font pt-4">'+
                '         <h4 class="list-group-item-heading">'+
                '            '+data[i].job_title+' '+
                // '            <div class="ribbon green">'+data[i].category_name+'</div>'+
                '         </h4>'+
                '         <p class="list-group-item-text"> <i class="fa fa-map-marker"></i>  '+data[i].job_location+'</p>'+
                '      </div>'+
                '      <div class="col-md-3 text-center pt-4">'+
                '         <button type="button" class="btn btn-default-outline btn-lg btn-block" onclick="applyJob('+data[i].hr_id+','+data[i].id+');"> Apply Now </button>'+
                '      </div>'+
                '   </a>'+
                '</div></th></tr>';
             }
            // $("#vacancies_list").html(vacancies_list);
             $("#vacancies_list").html(thead+"<tbody>"+vacancies_list+"</tbody>");
				$("#vacancies_list").dataTable();		
           		
        }	
	};
}

function applyJob(hr_id,job_id){
    getCategories(function(category_data) {
        var view = '<div class="row">'+
            '<div class="col-md-12 pb-3"><select class="form-control" id="job_category"></select></div>'+
            '<div class="col-md-12"><div class="pol-bg"><h5><i class="fa fa-address-book round-fa fa-2x"></i>&nbsp;&nbsp;'+
            '<span class="text-decoration">Privacy Policy</span></h5>'+
            '<p>Please Accept our <a href="#">privacy policy</a> to proceed. By using our services you "'+
            'are accepting the practices described in our <a href="#">privacy policy.</a></p>'+
            '<input type="radio" name="condition" id="accept">&nbsp;Accept&nbsp;&nbsp;<input type="radio" name="condition" id="decline">&nbsp;Decline</div>'+
            '</div>'+
            '<div class="col-md-12"><h5 class="pl-4"><i class="fa fa-upload round-fa fa-2x"></i>&nbsp;&nbsp;'+
            '<span class="text-decoration">Upload your resume</span></h5>'+
            '<input type="file" name="resume" id="resume" class="form-control">'+            
            '</div>'+
            '<div class="col-md-12 pb-5"><h5 class="pl-4"><i class="fa fa-user round-fa fa-2x"></i>&nbsp;&nbsp;'+
            '<span class="text-decoration">Personal Information</span></h5>'+
            '<div class="col-md-4"><select class="form-control" id="gender"><option value="Mr.">Mr.</option><option value="Mrs.">Mrs.</option></select></div>'+            
            '<div class="col-md-4"><input type="text" class="form-control" id="first_name" placeholder="First Name"></div>'+            
            '<div class="col-md-4"><input type="text" class="form-control" id="last_name" placeholder="Last Name"></div>'+            
            '</div>'+
            '<div class="col-md-12">'+                      
            '<div class="col-md-4"><input type="text" class="form-control" id="email" placeholder="Email"></div>'+            
            '<div class="col-md-4"><input type="text" class="form-control" id="contact_number" placeholder="Contact Number"></div>'+            
            '<div class="col-md-4"><select class="form-control" id="residence_country"><option value="residence">Residence Country</option></select></div>'+ 
            '</div>'+
            '</div><small class="error_message></small>';

        $(".modal .modal-title").text("Apply Job");	
        $(".modal .modal-body").html(view);
        $(".modal .modal-footer").html('<small class="error_message></small><button data-dismiss="modal" class="btn btn-danger">Cancel</button>&nbsp;&nbsp;<button class="btn btn-primary" onclick="applyThisJob('+hr_id+','+job_id+')">Submit</button>');
        $('.modal').modal('show');
        $("#job_category").html(category_data);
    });
}

function getCategories(callback){
        var options = "<option value=''>Select Sector</option>";

    var url = baseUrl + "hr/get_all_category";
    $.get(url, function (data) {
        var status = data.Status;
        var Message = data.Message;
        if (status) {
            var category = data.data;
            for (var i = 0; i < category.length; i++) {
         
                options = options + '<option  value="'+category[i].id +'">' + category[i].category_name + '</option>';
            }
        }
        else{
            options = options+"<option value=''>No Category Found</option>";
        }
       // console.log(options);
       $("#job_type").html(options);
        callback(options);
    });
}

function getJobType(){
    var options = "<option value=''>Select Sector</option>";
    var url = baseUrl + "hr/get_all_category";
    $.get(url, function (data) {
        var status = data.Status;
        var Message = data.Message;
        if (status) {
            var category = data.data;
            for (var i = 0; i < category.length; i++) {
        
                options = options + '<option  value="'+category[i].id +'">' + category[i].category_name + '</option>';
            }
        }
        else{
            options = options+"<option value=''>No Category Found</option>";
        }
    // console.log(options);
    $("#job_type").html(options);
    });
}

getJobType();

function searchJobs(){
    var keyword       = $("#keyword").val();
    var job_type    = $("#job_type").val();

    let formData = new FormData();
	formData.append('keyword',keyword);
	formData.append('job_type',job_type);
    
	let url = baseUrl+"job/search_jobs";
	let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            let vacancies_list = '';
            if(!status)
             {
                $("#vacancies_list").html(" <div class='error_message'>"+message+"</div>");
                 $(".error_message").text(message);
                 $(".error_message").css("color","red");
                 return false;	                
             } 
        
             
             let data = obj.data; 
             for (var i = 0; i < data.length; i++) {
                vacancies_list = vacancies_list+  '<div class="mb-5">'+
                '   <a href="#" class="list-group-item light-bg">'+
                '      <div class="media col-md-1 pt-5">'+
                '         <i class="fa fa-heart-o fa-2x"></i>'+
                '      </div>'+
                '      <div class="media col-md-2">'+
                '         <img src="assets/images/icon2.jpg">'+
                '      </div>'+
                '      <div class="col-md-6 carrer-font pt-4">'+
                '         <h4 class="list-group-item-heading">'+
                '            '+data[i].job_title+' '+
                // '            <div class="ribbon green">'+data[i].category_name+'</div>'+
                '         </h4>'+
                '         <p class="list-group-item-text"> <i class="fa fa-map-marker"></i>  '+data[i].job_location+'</p>'+
                '      </div>'+
                '      <div class="col-md-3 text-center pt-4">'+
                '         <button type="button" class="btn btn-default-outline btn-lg btn-block" onclick="applyJob('+data[i].hr_id+','+data[i].id+');"> Apply Now </button>'+
                '      </div>'+
                '   </a>'+
                '</div>';
             }
             $("#vacancies_list").html(vacancies_list);
           	
        }	
	};

}

function applyThisJob(hr_id,job_id){
    var job_category       = $("#job_category").val();
    var resume    = $("#resume").val();
    var gender = $("#gender").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var contact_number = $("#contact_number").val();
    var residence_country = $("#residence_country").val();

    let formData = new FormData();

    if (resume !== "") {
        var file_cat_image = document.getElementById('resume');
        var cat_image_ext = resume.split(".");
        cat_image_ext = cat_image_ext[cat_image_ext.length - 1];
				cat_image_ext = cat_image_ext.toLowerCase();	
		 
		if(cat_image_ext ==="png" || cat_image_ext ==="jpg" || cat_image_ext==="jpeg" || cat_image_ext==="pdf" || cat_image_ext==="csv")
		{
			formData.append('resume', file_cat_image.files[0]);
		}
        else {
			loaderHide();
			$(".error_message").html("File should be correct format.");
			$(".error_message").css("color","red");
            return false;
        }
	}


    formData.append('hr_id',hr_id);
    formData.append('job_id',job_id);
    formData.append('job_category',job_category);
    formData.append('gender',gender);
    formData.append('first_name',first_name);
    formData.append('last_name',last_name);
    formData.append('email',email);
    formData.append('contact_number',contact_number);
    formData.append('residence_country',residence_country);
    
	let url = baseUrl+"job/apply_job";
	let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            let vacancies_list = '';
            if(!status)
             {
                $("#vacancies_list").html(" <div class='error_message'>"+message+"</div>");
                 $(".error_message").text(message);
                 $(".error_message").css("color","red");
                 return false;	                
             } 
             alert(message)
             $(".error_message").text(message);
             $(".error_message").css("color","green"); 

            setTimeout(() => {
                $('.modal').modal('hide');
            }, 2000);
            
           	
        }	
	};
}



