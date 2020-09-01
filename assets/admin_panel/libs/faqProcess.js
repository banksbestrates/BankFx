let faqData = "";

function get_partner_faq() {
    let formData = new FormData();
    let url = baseUrl + "api/partner/faq";
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let obj = JSON.parse(xhr.responseText);
            let status = obj.Status;
            let message = obj.Message;
            if (!status) {}
            faqData = obj.data;
            let faq_list = '';
            for (var i = 0; i < faqData.length; i++) {
               
                faq_list = faq_list +
                    '<tr>' +
                    '    <td>'+(i+1)+ '</td>' +
                    '    <td>' + faqData[i].question + '</td>' +
                    '    <td>' + faqData[i].answer + '</td>' +
                    '</tr>'
            }
            $("#faqList").html(faq_list);
            $('#basic-datatables').DataTable();

        }
    };
}

function addFaqModal(){
    var modal_body= '<div class="form-group auestion">'+
                '<label for="name">Enter Question</label>'+
                '<textarea class="form-control" id="question" placeholder="Enter Question Here"></textarea>'+
            '</div>'+
            '<div class="form-group ">'+
                '<label for="name">Enter Answer</label>'+
                '<textarea class="form-control" placeholder="Enter Answer" id="answer"></textarea>'+
            '</div>'+     
            '<div class="form-group">'+
                '<small class="error_message text-danger"></small>'+
            '</div>'
                            
            $(".modal-header").html('<h5 class="text-primary text-bold">Add New FAQ</h5>');
            $(".modal-body").html(modal_body);
            $(".modal-footer").html('<button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel! Dont save	</button><button class="btn btn-sm btn-primary" onclick="save_partnerFAQ()">Save FAQ</button>');
            $(".modal").modal('show');
}

function save_partnerFAQ()
{

}