let categoryData="";
let subcategoryData="";
let productData="";

//Category module 
function get_category_list(service_id)
{
    let formData = new FormData();
    formData.append('service_id',service_id);
	let url = baseUrl+"api/services/get_service_categories";
	let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            if(!status){   
                $("#categoryList").html("<tr><td></td><td></td><td>No data available</td></td><td></td><td></td></tr>");          
             } 
             categoryData = obj.data;     
            console.log(categoryData);
             let category_list = '';
           
             for (var i = 0; i < categoryData.length; i++) {
                let view_subcategory = '';
                let add_more_cat="";
                 if(categoryData[i].subcategory_array.length>0)
                 {
                    categoryData[i].subcategory_array.length;
                     view_subcategory = '<a href="'+baseUrl+'subcategory_list/'+service_id+'/'+categoryData[i].id+'"><button class="btn btn-outline-primary btn-round ml-auto btn-xs">'+
                                        '    <i class="fa fa-eye"></i> View subcategory'+
                                        '  </button></a>'
                 }
                 else {
                
                    if(categoryData[i].has_subcategory =="1" ){
   
                     add_more_cat =    '<button class="btn btn-primary btn-round ml-auto btn-xs" onclick="addSubcategoryModal('+categoryData[i].id+')">'+
                                       '    Add subcategory'+
                                       '</button></a>'
                    }
                 }
                 
                 //price constraint
                 let price_max = "₦ " +categoryData[i].price_max;
                 let price_min   = "₦ " +categoryData[i].price_min;
                 if(categoryData[i].price_max=="" || categoryData[i].price_max==null  || categoryData[i].price_max==0)
                 {  price_max = "--";}
                 if(categoryData[i].price_min=="" || categoryData[i].price_min==null || categoryData[i].price_min==0)
                 { price_min = "--"; }

                 category_list = category_list+  	
                '<tr>'+
                '    <td>'+categoryData[i].category_name+'</td>'+
                '    <td>'+price_min+'</td>'+
                '    <td>'+price_max+'</td>'+
                '    <td>'+
                        '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Service" onclick="editCategoryModal('+i+')">'+
                        '    <i class="fa fa-edit"></i>'+
                        '</button>'+
                '    </td>'+
                '    <td>'+
                '       <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteCategoryAlert('+categoryData[i].id+')">'+
                '           <i class="fa fa-times"></i>'+
                '       </button>'+add_more_cat+view_subcategory+
                '    </td>'+
                '</tr>'
             }

            $("#categoryList").html(category_list);	
            $('#category-datatables').DataTable({
			});	
           		
        }	
	};
}
function addCategoryModal(service_id)
{
    var modal_body= '<div class="form-group category_name">'+
                       '<label for="name">Enter Category Name</label>'+
                       '<input type="text" class="form-control" id="category_name" placeholder="Enter Category Name">'+
                    '</div>'+
                    '<div class="form-group has_subcategory ">'+
                       '<label for="name">Does this category contain further subcategory</label>'+
                       '<select id="has_subcategory" class="form-control">'+
                           '<option value="">Select Option</option>'+
                           '<option value="0">No</option>'+
                           '<option value="1">Yes</option>'+
                       '</select>'+
                    '</div>'+
                    '<div class="row mx-2" id="price_div" style="display:none">'+
                        '<div class="form-group">'+
                        '<label for="name">Enter Price (Minimum)</label>'+
                            '<div class="input-group mb-3">'+
                            '    <div class="input-group-prepend">'+
                            '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                            '    </div>'+
                            '    <input type="text" id="price_min" class="form-control" placeholder="Price" value="" aria-label="price" aria-describedby="basic-addon1">'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                        '<label for="name">Enter Price (Maximum)</label>'+
                            '<div class="input-group mb-3">'+
                            '    <div class="input-group-prepend">'+
                            '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                            '    </div>'+
                            '    <input type="text"  id="price_max"class="form-control" placeholder="Price" aria-label="price" value="" aria-describedby="basic-addon1">'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                     '</div>';
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Add New Category</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="saveCategory('+service_id+')">Save Service</button>');
    $(".modal").modal('show');

    $('#has_subcategory').change(function() {
            if($(this).val()=="0"){
                $("#price_div").css("display","block");  
            }else if($(this).val()=="1"){
                $("#price_div").css("display","none");  
            }
    });
}

function saveCategory(service_id)
{
    let category_name    = $("#category_name").val();
    let has_subcategory  = $("#has_subcategory").val();
    let price_min        = $("#price_min").val();
    let price_max      = $("#price_max").val();
   
    if(category_name==""){
        $(".category_name").addClass("has-error"); 
        return false}
        else{   $(".category_name").removeClass("has-error"); }
    if(has_subcategory==""){
        $(".has_subcategory").addClass("has-error");
        return false;}
        else{  $(".has_subcategory").removeClass("has-error");}
    if(has_subcategory=="0")
    {
        if(price_max=="" || price_max=="")
        {
            $(".error_message").text("Price field is required! Please enter valid values for price");
            return false;
        }
    }

    let formData = new FormData();
    formData.append('category_type',"category");
    formData.append('service_id',service_id);
    formData.append('category_name',category_name);
    formData.append('has_subcategory',has_subcategory);
    formData.append('price_min',price_min);
    formData.append('price_max',price_max);
    let url = baseUrl+"api/services/add_category";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    $(".error_message").html(message);
                    return false;     
                 } else{
                    console.log(message);
                    $(".modal").hide();
                    swal(message, {
                        buttons: false,
                        timer: 2000,   
                    });
                  location.reload();
                 }
            }	
    };
}
function editCategoryModal(i)
{
        let category_data = categoryData[i];
        var options = '<option value="0" selected>No</option>'+
                      '<option value="1" selected>Yes</option>'
        if(categoryData[i].has_subcategory=="0")
        {
             options = '<option value="0" selected >No</option>'+
                    '<option value="1">Yes</option>'
        }
        else{
            options ='<option value="0" >No</option>'+
                    '<option value="1" selected>Yes</option>'
        }
        var modal_body= '<div class="form-group category_name">'+
            '<label for="name">Enter Category Name</label>'+
            '<input type="text" class="form-control" id="edit_category_name" placeholder="Enter Category Name" value="'+categoryData[i].category_name+'">'+
            '</div>'+
            '<div class="form-group has_subcategory ">'+
                '<label for="name">Does this category contain further subcategory</label>'+
                '<select id="edit_has_subcategory" class="form-control">'+options+
                '</select>'+
            '</div>'+
            '<div class="row mx-2" id="edit_price_div" style="display:none">'+
                '<div class="form-group">'+
                '<label for="name">Enter Price (Minimum)</label>'+
                    '<div class="input-group mb-3">'+
                    '    <div class="input-group-prepend">'+
                    '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                    '    </div>'+
                    '    <input type="text" id="edit_price_min" class="form-control" placeholder="Price"  aria-label="price" aria-describedby="basic-addon1" value="'+categoryData[i].price_min+'">'+
                    '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label for="name">Enter Price (Maximum)</label>'+
                    '<div class="input-group mb-3">'+
                    '    <div class="input-group-prepend">'+
                    '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                    '    </div>'+
                    '    <input type="text"  id="edit_price_max"class="form-control" placeholder="Price" aria-label="price" value="'+categoryData[i].price_max+'" aria-describedby="basic-addon1">'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="form-group">'+
                '<small class="error_message text-danger"></small>'+
            '</div>';
                        
        $(".modal-header").html('<h5 class="text-primary text-bold">Add New Category</h5>');
        $(".modal-body").html(modal_body);
        $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="updateCategory('+categoryData[i].id+')">Save Service</button>');
        $(".modal").modal('show');

      
        if($("#edit_has_subcategory").val()=="0")
        {
            $("#edit_price_div").css("display","block");   
        }

        $('#edit_has_subcategory').change(function() {
            if($(this).val()=="0"){
            $("#edit_price_div").css("display","block");  
            }else if($(this).val()=="1"){
            $("#edit_price_div").css("display","none");  
            $("#edit_price_min").val("");  
            $("#edit_price_max").val("");  
            }
        });
}

function updateCategory(category_id)
{
    let category_name    = $("#edit_category_name").val();
    let has_subcategory  = $("#edit_has_subcategory").val();
    let price_min        = $("#edit_price_min").val();
    let price_max        = $("#edit_price_max").val();
   
    if(category_name==""){
        $(".category_name").addClass("has-error"); 
        return false}
        else{   $(".category_name").removeClass("has-error"); }

    if(has_subcategory=="0")
    {
        if(price_max=="" || price_max=="")
        {
            $(".error_message").text("Price field is required! Please enter valid values for price");
            return false;
        }
    }

    let formData = new FormData();
    formData.append('category_id',category_id);
    formData.append('category_name',category_name);
    formData.append('has_subcategory',has_subcategory);
    formData.append('price_min',price_min);
    formData.append('price_max',price_max);
    let url = baseUrl+"api/services/update_category";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    $(".error_message").html(message);
                    return false;     
                 } else{
                    console.log(message);
                    $(".modal").hide();
                    swal(message, {
                        buttons: false,
                        timer: 2000,   
                    });
                  location.reload();
                 }
            }	
    };
}

// subcategory  module
function get_subcategory_list(service_id,category_id)
{
    let formData = new FormData();
    formData.append('category_id',category_id);
	let url = baseUrl+"api/services/get_sub_category";
	let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            if(!status){             
             } 
             subcategoryData = obj.data;  
             let subcategory_list ="";
             for(var j=0;j<subcategoryData.length;j++){
                    // view button constraints
                    let view_product = " ";
                    let add_more_product="";
                
                     if(subcategoryData[j].product_array.length > 0)
                     {
                        view_product = '<a href="'+baseUrl+'product_list/'+category_id+'/'+subcategoryData[j].id+'"><button class="btn btn-outline-primary btn-round ml-auto btn-xs">'+
                                            '    <i class="fa fa-eye"></i> View products'+
                                            '  </button></a>'
                     }
                     else {        
                        if(subcategoryData[j].has_subcategory =="1" ){
                        add_more_product = '<button class="btn btn-primary btn-round ml-auto btn-xs" onclick="addProductModal('+subcategoryData[j].id+')">'+
                                           ' Add product'+
                                           '</button></a>'
                        }
                     }
                    //price constraint
                        let price_max = "₦ " +subcategoryData[j].price_max;
                        let price_min   = "₦ " +subcategoryData[j].price_min;
                        if(subcategoryData[j].price_max=="" || subcategoryData[j].price_max==null  || subcategoryData[j].price_max==0)
                        {  price_max = "--";}
                        if(subcategoryData[j].price_min=="" || subcategoryData[j].price_min==null || subcategoryData[j].price_min==0)
                        { price_min = "--"; }

                    subcategory_list = subcategory_list+  	
                    '<tr>'+
                    '    <td>'+subcategoryData[j].category_name+'</td>'+
                    '    <td>'+subcategoryData[j].price_min+'</td>'+
                    '    <td>'+subcategoryData[j].price_max+'</td>'+
                    '    <td>'+
                            '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Subcategory" onclick="editSubcategoryModal('+j+')">'+
                            '    <i class="fa fa-edit"></i>'+
                            '</button>'+
                    '    </td>'+
                    '    <td>'+
                    '       <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteCategoryAlert('+subcategoryData[j].id+')">'+
                    '           <i class="fa fa-times"></i>'+
                    '       </button>'+add_more_product+view_product+
                    '    </td>'+
                    '</tr>'

             }
             $("#subcategoryList").html(subcategory_list);
        
             $('#subcategory-datatables').DataTable({
             });	
            }
    }
}

function addSubcategoryModal(category_id)
{
    var modal_body= '<div class="form-group subcat_name">'+
                       '<label for="name">Enter Subcategory Name</label>'+
                       '<input type="text" class="form-control" id="subcategory_name" placeholder="Enter subcategory Name">'+
                    '</div>'+
                    '<div class="form-group has_product ">'+
                       '<label for="name">Does this subcategory contain further products?</label>'+
                       '<select id="has_product" class="form-control">'+
                           '<option value="">Select Option</option>'+
                           '<option value="0">No</option>'+
                           '<option value="1">Yes</option>'+
                       '</select>'+
                    '</div>'+
                    '<div class="row mx-2" id="price_div" style="display:none">'+
                        '<div class="form-group">'+
                        '<label for="name">Enter Price (minimum)</label>'+
                            '<div class="input-group mb-3">'+
                            '    <div class="input-group-prepend">'+
                            '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                            '    </div>'+
                            '    <input type="text" id="price_min" class="form-control" placeholder="Price" value="" aria-label="price" aria-describedby="basic-addon1">'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                        '<label for="name">Enter Price (maximum)</label>'+
                            '<div class="input-group mb-3">'+
                            '    <div class="input-group-prepend">'+
                            '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                            '    </div>'+
                            '    <input type="text"  id="price_max"class="form-control" placeholder="Price" aria-label="price" value="" aria-describedby="basic-addon1">'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                     '</div>';
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Add New Subcategory</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="saveSubcategory('+category_id+')">Save Service</button>');
    $(".modal").modal('show');

    $('#has_product').change(function() {
            if($(this).val()=="0"){
                $("#price_div").css("display","block");  
            }else if($(this).val()=="1"){
                $("#price_div").css("display","none");  
            }
    });
}
function saveSubcategory(category_id)
{
    let subcategory_name    = $("#subcategory_name").val();
    let has_product         = $("#has_product").val();
    let price_min           = $("#price_min").val();
    let price_max         = $("#price_max").val();
   
    if(subcategory_name==""){
        $(".subcategory_name").addClass("has-error"); 
        return false}
        else{   $(".subcategory_name").removeClass("has-error"); }
    if(has_product==""){
        $(".has_product").addClass("has-error");
        return false;}
        else{  $(".has_product").removeClass("has-error");}
    if(has_product=="0")
    {
        if(price_max=="" || price_max=="")
        {
            $(".error_message").text("Price field is required! Please enter valid values for price");
            return false;
        }
    }

    let formData = new FormData();
    formData.append('category_type',"subcategory");
    formData.append('service_id',category_id);
    formData.append('category_name',subcategory_name);
    formData.append('has_subcategory',has_product);
    formData.append('price_min',price_min);
    formData.append('price_max',price_max);
    let url = baseUrl+"api/services/add_category";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    $(".error_message").html(message);
                    return false;     
                 } else{
                    console.log(message);
                    $(".modal").hide();
                    swal("Subcategory Added successfully", {
                        buttons: false,
                        timer: 2000,   
                    });
                  location.reload();
                 }
            }	
    };
}
function editSubcategoryModal(i)
{
        let subcategory_data = subcategoryData[i];
        var options = '<option value="0">No</option>'+
                      '<option value="1">Yes</option>'
        if(subcategory_data.has_subcategory=="0")
        {
             options = '<option value="0" selected >No</option>'+
                    '<option value="1">Yes</option>'
        }
        else{
            options ='<option value="0" >No</option>'+
                    '<option value="1" selected>Yes</option>'
        }
        var modal_body= '<div class="form-group subcategory_name">'+
            '<label for="name">Enter Category Name</label>'+
            '<input type="text" class="form-control" id="edit_subcategory_name" placeholder="Enter Subcategory Name" value="'+subcategory_data.category_name+'">'+
            '</div>'+
            '<div class="form-group edit_has_product ">'+
                '<label for="name">Does this category contain further products</label>'+
                '<select id="edit_has_product" class="form-control">'+options+
                '</select>'+
            '</div>'+
            '<div class="row mx-2" id="edit_price_div" style="display:none">'+
                '<div class="form-group">'+
                '<label for="name">Enter Price (Minimum)</label>'+
                    '<div class="input-group mb-3">'+
                    '    <div class="input-group-prepend">'+
                    '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                    '    </div>'+
                    '    <input type="text" id="edit_price_min" class="form-control" placeholder="Price"  aria-label="price" aria-describedby="basic-addon1" value="'+subcategory_data.price_min+'">'+
                    '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label for="name">Enter Price (Maximum)</label>'+
                    '<div class="input-group mb-3">'+
                    '    <div class="input-group-prepend">'+
                    '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                    '    </div>'+
                    '    <input type="text"  id="edit_price_max"class="form-control" placeholder="Price" aria-label="price" value="'+subcategory_data.price_max+'" aria-describedby="basic-addon1">'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="form-group">'+
                '<small class="error_message text-danger"></small>'+
            '</div>';
                        
        $(".modal-header").html('<h5 class="text-primary text-bold">Add New Category</h5>');
        $(".modal-body").html(modal_body);
        $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="updateSubcategory('+subcategory_data.id+')">Save Service</button>');
        $(".modal").modal('show');

      
        if($("#edit_has_product").val()=="0")
        {
            $("#edit_price_div").css("display","block");   
        }

        $('#edit_has_product').change(function() {
            if($(this).val()=="0"){
            $("#edit_price_div").css("display","block");  
            }else if($(this).val()=="1"){
            $("#edit_price_div").css("display","none");  
            $("#edit_price_min").val("");  
            $("#edit_price_max").val("");  
            }
        });
}
function updateSubcategory(category_id)
{
    let category_name    = $("#edit_subcategory_name").val();
    let has_subcategory  = $("#edit_has_product").val();
    let price_min        = $("#edit_price_min").val();
    let price_max        = $("#edit_price_max").val();
   
    if(category_name==""){
        $(".subcategory_name").addClass("has-error"); 
        return false}
        else{   $(".subcategory_name").removeClass("has-error"); }

    if(has_subcategory=="0")
    {
        if(price_max=="" || price_max=="")
        {
            $(".error_message").text("Price field is required! Please enter valid values for price");
            return false;
        }
    }

    let formData = new FormData();
    formData.append('category_id',category_id);
    formData.append('category_name',category_name);
    formData.append('has_subcategory',has_subcategory);
    formData.append('price_min',price_min);
    formData.append('price_max',price_max);
    let url = baseUrl+"api/services/update_category";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    $(".error_message").html(message);
                    return false;     
                 } else{
                    console.log(message);
                    $(".modal").hide();
                    swal(message, {
                        buttons: false,
                        timer: 2000,   
                    });
                  location.reload();
                 }
            }	
    };
}

//get product list
function get_product_list(category_id,subcategory_id)
{
    let formData = new FormData();
    formData.append('subcategory_id',subcategory_id);
	let url = baseUrl+"api/services/get_products";
	let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200 ) {
            let obj = JSON.parse(xhr.responseText);  
            let status= obj.Status;          
            let message= obj.Message; 
            if(!status){      
                $("#productList").html("<tr><td>No data available</td></tr>");       
             } 
             productData = obj.data;  
             console.log("=======",productData);
             let product_list ="";
             for(var j=0;j<productData.length;j++){

                    //price constraint
                        let price_max = "₦ " +productData[j].price_max;
                        let price_min   = "₦ " +productData[j].price_min;
                        if(productData[j].price_max=="" || productData[j].price_max==null  || productData[j].price_max==0)
                        {  price_max = "--";}
                        if(productData[j].price_min=="" || productData[j].price_min==null || productData[j].price_min==0)
                        { price_min = "--"; }

                    product_list = product_list+  	
                    '<tr>'+
                    '    <td>'+productData[j].category_name+'</td>'+
                    '    <td>'+productData[j].price_min+'</td>'+
                    '    <td>'+productData[j].price_max+'</td>'+
                    '    <td>'+
                            '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Service" onclick="editProductModal('+j+')">'+
                            '    <i class="fa fa-edit"></i>'+
                            '</button>'+
                    '    </td>'+
                    '    <td>'+
                    '       <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteCategoryAlert('+productData[j].id+')">'+
                    '           <i class="fa fa-times"></i>'+
                    '       </button>'+
                    '    </td>'+
                    '</tr>'

             }
             $("#productList").html(product_list);
        
             $('#product-datatables').DataTable({
             });	
            }
    }
}
function addProductModal(category_id)
{
    var modal_body= '<div class="form-group product_name">'+
                       '<label for="name">Enter product Name</label>'+
                       '<input type="text" class="form-control" id="product_name" placeholder="Enter product Name">'+
                    '</div>'+
                    '<div class="row mx-2" id="price_div">'+
                        '<div class="form-group">'+
                        '<label for="name">Enter Price (minimum)</label>'+
                            '<div class="input-group mb-3">'+
                            '    <div class="input-group-prepend">'+
                            '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                            '    </div>'+
                            '    <input type="text" id="price_min" class="form-control" placeholder="Price" value="" aria-label="price" aria-describedby="basic-addon1">'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group">'+
                        '<label for="name">Enter Price (maximum)</label>'+
                            '<div class="input-group mb-3">'+
                            '    <div class="input-group-prepend">'+
                            '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                            '    </div>'+
                            '    <input type="text"  id="price_max"class="form-control" placeholder="Price" aria-label="price" value="" aria-describedby="basic-addon1">'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                     '<div class="form-group">'+
                        '<small class="error_message text-danger"></small>'+
                     '</div>';
                                    
    $(".modal-header").html('<h5 class="text-primary text-bold">Add New Product</h5>');
    $(".modal-body").html(modal_body);
    $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="saveProduct('+category_id+')">Save Product</button>');
    $(".modal").modal('show');

}
function saveProduct(category_id)
{
    let product_name        = $("#product_name").val();
    let has_product         = "0";
    let price_min           = $("#price_min").val();
    let price_max           = $("#price_max").val();
   
    if(product_name==""){
        $(".product_name").addClass("has-error"); 
        return false}
        else{   $(".product_name").removeClass("has-error"); }
    if(has_product=="0")
    {
        if(price_max=="" || price_max=="")
        {
            $(".error_message").text("Price field is required! Please enter valid values for price");
            return false;
        }
    }

    let formData = new FormData();
    formData.append('category_type',"product");
    formData.append('service_id',category_id);
    formData.append('category_name',product_name);
    formData.append('has_subcategory',has_product);
    formData.append('price_min',price_min);
    formData.append('price_max',price_max);
    let url = baseUrl+"api/services/add_category";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    $(".error_message").html(message);
                    return false;     
                 } else{
                    console.log(message);
                    $(".modal").hide();
                    swal("New product added successfully", {
                        buttons: false,
                        timer: 2000,   
                    });
                  location.reload();
                 }
            }	
    };
}
function editProductModal(i)
{
        let product_data = productData[i];
       
        var modal_body= '<div class="form-group product_name">'+
            '<label for="name">Enter Product Name</label>'+
            '<input type="text" class="form-control" id="edit_product_name" placeholder="Enter product Name" value="'+product_data.category_name+'">'+
            '</div>'+
            '<div class="row mx-2" id="edit_price_div"style="display:block">'+
                '<div class="form-group">'+
                '<label for="name">Enter Price (Minimum)</label>'+
                    '<div class="input-group mb-3">'+
                    '    <div class="input-group-prepend">'+
                    '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                    '    </div>'+
                    '    <input type="text" id="edit_price_min" class="form-control" placeholder="Price"  aria-label="price" aria-describedby="basic-addon1" value="'+product_data.price_min+'">'+
                    '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label for="name">Enter Price (Maximum)</label>'+
                    '<div class="input-group mb-3">'+
                    '    <div class="input-group-prepend">'+
                    '        <span class="input-group-text" id="basic-addon1">₦</span>'+
                    '    </div>'+
                    '    <input type="text"  id="edit_price_max"class="form-control" placeholder="Price" aria-label="price" value="'+product_data.price_max+'" aria-describedby="basic-addon1">'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="form-group">'+
                '<small class="error_message text-danger"></small>'+
            '</div>';
                        
        $(".modal-header").html('<h5 class="text-primary text-bold">Add New Category</h5>');
        $(".modal-body").html(modal_body);
        $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save</button>'+
        '<button class="btn btn-sm btn-primary" onclick="updateProduct('+product_data.id+')">Save product</button>');
        $(".modal").modal('show');

}
function updateProduct(category_id)
{
    let category_name    = $("#edit_product_name").val();
    let has_subcategory  = "0";
    let price_min        = $("#edit_price_min").val();
    let price_max        = $("#edit_price_max").val();
   
    if(category_name==""){
        $(".product_name").addClass("has-error"); 
        return false}
        else{   $(".product_name").removeClass("has-error"); }

    if(has_subcategory=="0")
    {
        if(price_max=="" || price_max=="")
        {
            $(".error_message").text("Price field is required! Please enter valid values for price");
            return false;
        }
    }

    let formData = new FormData();
    formData.append('category_id',category_id);
    formData.append('category_name',category_name);
    formData.append('has_subcategory',has_subcategory);
    formData.append('price_min',price_min);
    formData.append('price_max',price_max);
    let url = baseUrl+"api/services/update_category";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
            if (xhr.status == 200 ) {
                let obj = JSON.parse(xhr.responseText);  
                let status= obj.Status;          
                let message= obj.Message; 
                if(!status){   
                    $(".error_message").html(message);
                    return false;     
                 } else{
                    console.log(message);
                    $(".modal").hide();
                    swal("Product updated successfully", {
                        buttons: false,
                        timer: 2000,   
                    });
                  location.reload();
                 }
            }	
    };
}



//generi for 3 modals 


function deleteCategoryAlert(category_id)
{
   swal({
       title: 'Are you sure?',
       text: "You won't be able to revert this!",
       type: 'warning',
       buttons:{
           cancel: {
               visible: true,
               text : 'No, cancel!',
               className: 'btn btn-danger'
           },        			
           confirm: {
               text : 'Yes, delete it!',
               className : 'btn btn-success'
           }
       }
   }).then((willDelete) => {
       if (willDelete) {
           let formData = new FormData();
           formData.append('category_id',category_id);
           let url = baseUrl+"api/services/delete_category";
           let xhr = new XMLHttpRequest();
           xhr.open('POST', url);
           xhr.send(formData);
           xhr.onload = function() {
                   if (xhr.status == 200 ) {
                       let obj = JSON.parse(xhr.responseText);  
                       let status= obj.Status;          
                       let message= obj.Message; 
                       if(!status){   
                           conosle.log(message);
                           return false;     
                        } 
                        else{
                         
                           swal(message, {
                               icon: "success",
                               buttons : {
                                   confirm : {
                                       className: 'btn btn-success'
                                   }
                               }
                           });
                          location.reload();
                        }        
                   }	
               }
           } 
   });
}









