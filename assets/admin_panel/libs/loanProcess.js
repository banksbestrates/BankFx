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
            let advice_heading = "";
            let overview_data = "";
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
                   else if(loanData[i].div_type=="advice_heading")
                   {
                    advice_heading ='<div class="col-md-12">'+
                        '       <div class="row">'+
                        '           <div class="col-md-10"><input type="text"  class="form-control" value="'+ loanData[i].heading+'" id="edit_advice_heading"/></h4></div>'+
                        '           <div class="col-md-2">'+
                        '               <button class="btn btn-sm btn-primary" onclick="editAdviceHeading('+loanData[i].id+')">Update</button>'+
                        '           </div>'+
                        '       </div>'+
                        '   </div>'
                   } 
                   else if(loanData[i].div_type=="overview_heading")
                   {
                        overview_data = '<div class="col-md-10">'+
                        '<h1>'+loanData[i].heading+'</h1>'+
                        '<img src="'+baseUrl+loanData[i].image+'" style="height:100px"/>'+
                        '<p>'+loanData[i].content+'</p>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                        '   <button class="btn btn-primary btn-sm" onclick=editOverviewModel('+i+')>Edit </button>'+
                        '</div>'
                } 
             }
            $("#trending_articles").html(trending_list);	
            $("#advice_heading").html(advice_heading);	
            $("#top_banner_text").html(overview_data);	

        }
    };
}
	
function editOverviewModel(i,loan_type="")
{
    let loan_data = loanData[i];
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+loan_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+loan_data.content+'</textarea>'+
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
                    '</div>'

    $(".modal-dialog").addClass("modal-lg");                                 
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button>'+
    '<button class="btn btn-sm btn-primary" onclick=updateOverview('+loan_data.id+',"'+loan_type+'")>Update</button>');
    $(".modal").modal('show');

    CKEDITOR.replace( 'editor' );
    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
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

function updateOverview(id,loan_type="")
{
    var content= CKEDITOR.instances.data.getData();
    if (content == "") {
        alert("Enter Valid Content");
    }
    let heading         = $("#edit_heading").val();
    let image_src       = $("#src").val();
    // let content         = $("#edit_content").val();
    let base_url = baseUrl+"api/admin/update_loan_overview";
    if(loan_type=="personal_loan")
    {
        base_url =  baseUrl+"api/admin/update_personal_loan";
    }
    else if(loan_type=="auto_loan")
    {
        base_url =  baseUrl+"api/admin/update_auto_loan";
    }
    else if(loan_type=="debt")
    {
        base_url=  baseUrl + "api/admin/update_debt_consolidation";
    }
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
    let url = base_url
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

//=====================PERSONAL LOAN / AUTO LONA/ STUDENT LOAN====================//
function get_loan_inner_page(loan_type) {

    let base_url="";
    if(loan_type=="personal_loan")
    {
        base_url = baseUrl + "api/admin/get_personal_loan";
    }
    else if(loan_type=="auto_loan")
    {
        base_url = baseUrl + "api/admin/get_auto_loan";
    }
    else if(loan_type=="student_loan")
    {
        base_url = baseUrl + "api/admin/get_student_loan";
    }
    let formData = new FormData();
    let url = base_url;
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
                    '    <span style="float:right"><button class="btn btn-sm btn-primary" onclick=loanContentModel('+i+',"'+loan_type+'")>EDIT</button></span>  '+
                    '  <p>'+loanData[i].content+'</p>'+
                    '</div><hr/>'
                   }
                //    else if(loanData[i].div_type=="related_article")
                //    {
                //         related_list = related_list+ 
                //         '   <div class="col-md-12">'+
                //         '       <div class="row">'+
                //         '           <div class="col-md-5">'+
                //         '             <img src="'+baseUrl+loanData[i].image+'" alt="" width="100%" >'+
                //         '           </div>'+
                //         '           <div class="col-md-5 py-4">'+
                //         '               <h3 class="text-dark">'+loanData[i].heading+'</h3>'+
                //         '               <p>'+loanData[i].content+'</p>'+
                //         '           </div>'+
                //         '           <div class="col-md-2">'+
                //         '               <button class="btn btn-sm btn-primary" onclick=editOverviewModel('+i+',"'+loan_type+'")>Edit</button>'+
                //         '           </div>'+
                //         '       </div>'+
                //         '   </div>'
                //    } 
                   else if(loanData[i].div_type=="overview_heading")
                   {
                        overview_data = '<div class="col-md-10">'+
                        '<h1>'+loanData[i].heading+'</h1>'+
                        '<img src="'+baseUrl+loanData[i].image+'" style="height:100px"/>'+
                        '<p>'+loanData[i].content+'</p>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                        '   <button class="btn btn-primary btn-sm" onclick=contentModel('+i+',"'+loan_type+'")>Edit </button>'+
                        '</div>'
                } 
             }
            $("#normal_articles").html(normal_list);	
            // $("#related_articles").html(related_list);	
            $("#top_banner_text").html(overview_data);	

        }
    };
}

function loanContentModel(i,loan_type)
{
    var loan_data = loanData[i];
    var modal_body= '<div class="form-group">'+
    '<label for="name">Heading</label>'+
    '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+loan_data.heading+'">'+
     '</div>'+
     '<div class="form-group ">'+
        '<label for="name">Content</label>'+
        '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+loan_data.content+'</textarea rows="5">'+
     '</div>'+
     '<div class="form-group">'+
        '<small class="error_message text-danger"></small>'+
    '</div>'

    $(".modal-dialog").addClass("modal-lg");
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick=updateLoanData('+loan_data.id+',"'+loan_type+'")>Update</button>');
    $(".modal").modal('show');

    
    CKEDITOR.replace( 'editor' );
}

function updateLoanData(id,loan_type)
{
    let base_url =  "";
    if(loan_type=="personal_loan")
    {
        base_url=  baseUrl + "api/admin/update_personal_loan";
    }
    else if(loan_type=="auto_loan")
    {
        base_url=  baseUrl + "api/admin/update_auto_loan";
    }
    else if(loan_type=="student_loan")
    {
        base_url=  baseUrl + "api/admin/update_student_loan";
    }
    else if(loan_type=="debt")
    {
        base_url=  baseUrl + "api/admin/update_debt_consolidation";
    }
    var content= CKEDITOR.instances.data.getData();
    if (content == "") {
        alert("Enter Valid Content");
    }
    var heading   = $("#edit_heading").val();

    let formData = new FormData();
    formData.append('content', content);
    formData.append('heading', heading);
    formData.append('id', id);
    let url = base_url;
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {
                $(".error_message").html(message);
                return false;
            } else {
                swal(message, {
                    buttons: false,
                    timer: 2000,
                });
                location.reload();
            }
        }
    };
}

//=====================DEBT CONSOLIDATION====================//
function get_debt_consolidation_data(loan_type) {
  
    let formData = new FormData();
    let url = baseUrl + "api/admin/get_debt_consolidation_data";
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
            console.log(loanData);
            let normal_list = "";
            let related_list = "";
            let debt_content = "";
            let debt_image = "";
               for (var i = 0; i < loanData.length; i++) {
                   if(loanData[i].div_type=="normal_content")
                   {
                    normal_list = normal_list+ 
                    '<div class="col-md-12">'+
                    '    <h2 class="text-dark font-weight-bold">'+loanData[i].heading+'</h2> '+
                    '    <span style="float:right"><button class="btn btn-sm btn-primary" onclick=loanContentModel('+i+',"'+loan_type+'")>EDIT</button></span>  '+
                    '  <p>'+loanData[i].content+'</p>'+
                    '</div><hr/>'
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
                        '               <button class="btn btn-sm btn-primary" onclick=editOverviewModel('+i+',"'+loan_type+'")>Edit</button>'+
                        '           </div>'+
                        '       </div>'+
                        '   </div>'
                   } 
                   else if(loanData[i].div_type=="debt_top_content"){
                   
                    debt_content = debt_content +'<h5 class="font-weight-bold">'+loanData[i].heading+'<span style="float:right">'+
                    '   <button class="btn btn-sm btn-primary" onclick=loanContentModel('+i+',"'+loan_type+'")>EDIT</button></span></h5>'+
                    '    <p> '+loanData[i].content+'</p>'

                   }
                   else{
                    debt_image = '<div style="background-image:url('+baseUrl+loanData[i].image+');height:80%;width:100%;background-size:contain;background-position:center;background-repeat:no-repeat">'+
                                 '</div><button class="btn-sm btn-block btn-primary text-centers">EDIT IMAGE</button>'
                   }
             }
            $("#normal_articles").html(normal_list);	
            $("#related_articles").html(related_list);	
            $("#related_articles").html(related_list);	
            $("#top_box_content").html(debt_content);	
            $("#top_box_image").html(debt_image);	

        }
    };
}


//=====================CONENT TOP BANNER====================//
function contentModel(i,loan_type="")
{
    let loan_data = loanData[i];
    var modal_body= '<div class="form-group">'+
                        '<label for="name">Heading</label>'+
                        '<input type="text" class="form-control" id="edit_heading" placeholder="Enter Heading" value="'+loan_data.heading+'">'+
                     '</div>'+
                     '<div class="form-group ">'+
                        '<label for="name">Content</label>'+
                        '<textarea rows="5" class="form-control" placeholder="Add Content" name="editor" id="data">'+loan_data.content+'</textarea>'+
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
                    '</div>'

    $(".modal-dialog").addClass("modal-lg");                                   
    $(".modal-header").html('<h5 class="text-primary text-bold">Edit</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick=updateContent('+loan_data.id+',"'+loan_type+'")>Update</button>');
    $(".modal").modal('show');
    
    CKEDITOR.replace( 'editor' );
    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src,target);
}

function updateContent(id,loan_type="")
{
    let base_url = baseUrl+"api/admin/update_loan_overview";

    if(loan_type=="personal_loan")
    {
        base_url=  baseUrl + "api/admin/update_personal_loan";
    }
    else if(loan_type=="auto_loan")
    {
        base_url=  baseUrl + "api/admin/update_auto_loan";
    }
    else if(loan_type=="student_loan")
    {
        base_url=  baseUrl + "api/admin/update_student_loan";
    }

    var content= CKEDITOR.instances.data.getData();
    if (content == "") {
        alert("Enter Valid Content");
    }
    var heading   = $("#edit_heading").val();
    var image_src  =   $("#src").val();
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

    formData.append('content', content);
    formData.append('heading', heading);
    formData.append('id', id);
    let url = base_url;
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {
                $(".error_message").html(message);
                return false;
            } else {
                swal(message, {
                    buttons: false,
                    timer: 2000,
                });
                location.reload();
            }
        }
    };
}

function editAdviceHeading(id)
{
    advice_heading = $("#edit_advice_heading").val();
    let formData = new FormData();
    formData.append('content', "nothing");
    formData.append('heading', advice_heading);
    formData.append('id', id);
    let url = baseUrl + "api/admin/update_loan_overview";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {
                $(".error_message").html(message);
                return false;
            } else {
                swal(message, {
                    buttons: false,
                    timer: 2000,
                });
                location.reload();
            }
        }
    };

}
