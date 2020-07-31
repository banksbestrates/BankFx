//loan module 
let loanData="";
function get_loan_overview() {
    let formData = new FormData();
    let url = baseUrl + "api/admin/get_loan_overview";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {
            }
            loanData = obj.data;
            let trending_list = "";
            let related_list = "";
               for (var i = 0; i < loanData.length; i++) {
                   if(loanData[i].div_type=="trending_article")
                   {
                        trending_list = trending_list+ 
                        '   <div class="col-md-4">'+
                        '    <div class="card">'+
                        '        <div class="card-header px-0 py-0">'+
                        '            <img src="'+baseUrl+loanData[i].image+'" alt="" width="100%" >'+
                        '        </div>'+
                        '        <div class="card-block  text-center px-2 ">'+
                        '            <h4 class=" font-weight-bold pt-2">'+loanData[i].heading+'</h4>'+
                        '            <p class="card-text">'+loanData[i].content+'</p>'+
                        '        </div>'+
                        '        <div class="w-100"></div>'+
                        '        <div class="card-footer text-center ">'+
                        '            <button class="btn btn-primary btn-sm" onclick="editOverviewModel('+i+')">Edit </button>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>'
                   }
                   else if(loanData[i].div_type=="related_article")
                   {
                        related_list = related_list+ 
                        '   <div class="col-md-12">'+
                        '       <div class="row">'+
                        '           <div class="col-md-5">'+
                        '             <img src="'+baseUrl+loanData[i].image+'" alt="" width="100%" >'+
                        '           </div>'+
                        '           <div class="col-md-5 py-4">'+
                        '               <h3 class="text-dark">'+loanData[i].heading+'</h3>'+
                        '               <p>'+loanData[i].content+'</p>'+
                        '           </div>'+
                        '           <div class="col-md-2">'+
                        '               <button class="btn btn-sm btn-primary" onclick="editOverviewModel('+i+')">Edit</button>'+
                        '           </div>'+
                        '       </div>'+
                        '   </div>'
                   } 
             }
            $("#trending_articles").html(trending_list);	
            $("#related_articles").html(related_list);	

        }
    };
}
function showImage(src,target) {
    var fr=new FileReader();
    // when image is loaded, set the src of the image where you want to display it
    fr.onload = function(e) { target.src = this.result; };
    src.addEventListener("change",function() {
        // fill fr with image data    
        fr.readAsDataURL(src.files[0]);
    });
}	
function editOverviewModel(i)
{
    let loan_data = loanData[i];
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+loan_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea class="form-control" placeholder="Add Content" id="edit_content">'+loan_data.content+'</textarea>'+
                     '</div>'+

                     '<div class="form-group">'+
                        '<label for="image">Image</label>'+
                            '<div class="row">'+
                                '<input type="file" class="form-control col-md-6 col-sm-4" id="src">'+
                                '<div class="col-md-6 col-sm-4">'+
                                    '<label class="imagecheck mb-4">'+
                                    '	<figure class="imagecheck-figure">'+
                                    '		<img src="'+baseUrl+loan_data.image+'" alt=" Image" class="imagecheck-image" id="target">'+
                                    '	</figure>'+
                                    '</label>'+
                                '</div>'+
                            '</div>'
                     '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                    '</div>'+
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="updateOverview('+loan_data.id+')">Update</button>');
    $(".modal").modal('show');

    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
}
function updateOverview(id)
{
    let heading         = $("#edit_heading").val();
    let image_src       = $("#src").val();
    let content     = $("#edit_content").val();
  
    let formData = new FormData();
    if (image_src !== "") {
            var image = document.getElementById('src');
            var image_ext = image_src.split(".");
            image_ext = image_ext[image_ext.length - 1];
            image_ext = image_ext.toLowerCase();	
             
            if(image_ext ==="png" || image_ext ==="jpg" || image_ext==="jpeg" || image_ext==="svg")
            {
                formData.append('image', image.files[0]);
            }
            else {
                $(".error_message").html("Image should be png/jpg/jpeg/svg format");
                return false;
            }
    }

    formData.append('heading',heading);
    formData.append('content',content);
    formData.append('id',id);
    let url = baseUrl+"api/admin/update_loan_overview";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    console.log(message);
                    $(".error_message").html(message);     
                 } 
				swal(message, {
					buttons: false,
                    timer: 2000,   
                });
               location.reload();
            }	
    };
}

//=====================PERSONAL LOAN====================//
function get_personal_loan() {
    let formData = new FormData();
    let url = baseUrl + "api/admin/get_personal_loan";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {
            }
            loanData = obj.data;
            let normal_list = "";
            let related_list = "";
               for (var i = 0; i < loanData.length; i++) {
                   if(loanData[i].div_type=="normal_content")
                   {
                    normal_list = normal_list+ 
                    '<div class="col-md-12">'+
                    '    <h2 class="text-dark font-weight-bold">'+loanData[i].heading+'</h2> '+
                    '    <span style="float:right"><button class="btn btn-sm btn-primary">EDIT</button></span>  '+
                    '    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus earum placeat totam quod, commodi itaque! Inventore nihil iure dolor delectus rerum placeat libero corrupti, exercitationem, molestias eveniet eius tempore laudantium!</p>             '+
                    '</div>'
                   }
                   else if(loanData[i].div_type=="related_article")
                   {
                        related_list = related_list+ 
                        '   <div class="col-md-12">'+
                        '       <div class="row">'+
                        '           <div class="col-md-5">'+
                        '             <img src="'+baseUrl+loanData[i].image+'" alt="" width="100%" >'+
                        '           </div>'+
                        '           <div class="col-md-5 py-4">'+
                        '               <h3 class="text-dark">'+loanData[i].heading+'</h3>'+
                        '               <p>'+loanData[i].content+'</p>'+
                        '           </div>'+
                        '           <div class="col-md-2">'+
                        '               <button class="btn btn-sm btn-primary" onclick="editOverviewModel('+i+')">Edit</button>'+
                        '           </div>'+
                        '       </div>'+
                        '   </div>'
                   } 
             }
            $("#normal_articles").html(normal_list);	
            $("#related_articles").html(related_list);	

        }
    };
}