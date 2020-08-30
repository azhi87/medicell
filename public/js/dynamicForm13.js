var i=0;
function addRow()
{
   i=$('#howManyItems').val();
   i++;
  var item="<tr id='"+i+"'>";
  item+='<td class="col-lg-4"><select col="1" class="js-example-basic-multiple col-lg-9 col-sm-9 text-primary subtests" name="subtests['+i+']">';
  item+=document.getElementById('allItems').innerHTML;
  item+='</select></td>';
  item+='<td class="col-lg-2"><input type="text" class="form-control" name="result['+i+']"></td>';
  item+='<td class="sale_price"><span></span></td>';
  item+='<td><span></span></td>';
  item+='<td class="col-lg-2 hidden"><label class="radio-inline">';
  item+='<input type="radio" name="negative['+i+']" value="normal"  checked>N</label>';
  item+='<label class="radio-inline"><input type="radio" name="negative['+i+']" value="H">H</label>';
  item+='<label class="radio-inline"><input type="radio" name="negative['+i+']" value="L">L</label>';
  item+='<label class="radio-inline"><input type="radio" name="negative['+i+']" value="-">-</label>';
  item+='<td class="col-lg-1"><button type="button" class="btn btn-danger btn-circle" onclick="removeRow('+i+')" ><i class="fa fa-minus" ></button></td></td></tr>';

    $('#testBody').append(item);
    $('.js-example-basic-multiple').select2();
    $('#howManyItems').val(i);
}

function removeRow(id)
{
   $('#'+id).remove();
}

function getPatientDetails()
{

  var id= $("#select2").val();
  if(id==0)
  {
       $("#fname").val("");
                        $("#phone").val("");
                        $("#years").val("");
                        $("#months").val("");

  }
            $.ajax({
                       type: "GET",
                       dataType: "json",
                       url: "/patients/patientNameById",
                       data: "id=" + id,
                       success: function(data){

                        $("#fname").val(data.fname);
                        $("#phone").val(data.phone);
                        $("#years").val(data.years);
                        $("#months").val(data.months);
                        $("#marital_status").val(data.marital_status);
                        $("#gender").val(data.gender);
                       
                       // $("#phone").attr('readonly','readonly');
       
                       // getSaleTotalPrice();
                       
                       },
                       error:function(){
                        $("#customerName").text('کۆدی کڕیارەکە هەڵەیە');
                        $("#customerName").val("");
                        $("#customerAddress").val("");
                        $("#mobile").val("");
                        $("#mobile2").val("");
                        $("#customerName").attr('readonly',false);
                        $("#mobile").attr('readonly',false);
                        $("#mobile2").attr('readonly',false);
                        $("#customerAddress").attr('readonly',false);
                       }
                     });
}

$(document).ready(function() {
     $('#testBody').on('change','.subtests',function () {

        var $this =$(this);
        var myVar = $this.val();
        var normal_range=($(this).find('option:selected').data('normal_range'));
        var sale_price=($(this).find('option:selected').data('sale_price'));
        $this.closest('td').next('td').next('td').html(sale_price);
        $this.closest('td').next('td').next('td').next('td').html(normal_range);
        getSaleTotalPrice();
   
    });

}); 


function getSaleTotalPrice()
{
  var subtotal=0;
  
  $(".sale_price").each(function(){
    subtotal+=+($(this).text());
  });
  var discount=$("#discount").val();
  var discount_percentage=$("#discount_percentage").val()*subtotal*0.01;
  $("#subtotal").val(subtotal);
  $("#total").val(subtotal-discount-discount_percentage);
}

function addSpecialRows(id)
{
    $.ajax({
                       type: "GET",
                       dataType: "json",
                       url: "/specials/ajaxCall",
                       data: "id=" + id,
                       success: function(data){
                        $.each(data,function(index,data){

                           i=$('#howManyItems').val();
                           i++;
                          var item="<tr id='"+i+"'>";
                          item+='<td class="col-lg-4"><select id="special'+i+'" col="1" class="js-example-basic-multiple col-lg-9 col-sm-9 text-primary subtests" name="subtests['+i+']">';
                          item+=document.getElementById('allItems').innerHTML;
                          item+='</select></td>';
                          item+='<td class="col-lg-2"><input type="text" class="form-control" name="result['+i+']"></td>';
                          item+='<td class="sale_price"><span></span></td>';
                          item+='<td><span></span></td>';
                          item+='<td class="col-lg-2 hidden"><label class="radio-inline">';
                          item+='<input type="radio" name="negative['+i+']" value="normal"  checked>N</label>';
                          item+='<label class="radio-inline"><input type="radio" name="negative['+i+']" value="H">H</label>';
                          item+='<label class="radio-inline"><input type="radio" name="negative['+i+']" value="L">L</label>';
                          item+='<label class="radio-inline"><input type="radio" name="negative['+i+']" value="-">-</label>';
                          item+='<td class="col-lg-1"><button type="button" class="btn btn-danger btn-circle" onclick="removeRow('+i+')" ><i class="fa fa-minus" ></button></td></td></tr>';

                            $('#testBody').append(item);
                            $('#howManyItems').val(i);
                            $("#special"+i).val(data.subtest_id).trigger('change');
                            $('.js-example-basic-multiple').select2();
                        });

                       },
                     });


}

 function closePrint () {
  document.body.removeChild(this.__container__);
}

function setPrint () {
  this.contentWindow.__container__ = this;
  this.contentWindow.onbeforeunload = closePrint;
  this.contentWindow.onafterprint = closePrint;
  this.contentWindow.focus(); // Required for IE
  this.contentWindow.print();
}

function printPage (sURL) {
  var oHiddFrame = document.createElement("iframe");
  oHiddFrame.onload = setPrint;
  oHiddFrame.style.visibility = "hidden";
  oHiddFrame.style.position = "fixed";
  oHiddFrame.style.right = "0";
  oHiddFrame.style.bottom = "0";
  oHiddFrame.src = sURL;
  document.body.appendChild(oHiddFrame);
}