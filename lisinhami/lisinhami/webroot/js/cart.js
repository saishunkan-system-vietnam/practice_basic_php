$(document).ready(function () {

    getFee($('#shipUnit').find('option:selected').attr('fee'))
    getAddress($('#ad_cd').find('option:selected').attr('address'))


    $(document).on('change', '#shipUnit', function() {
        getFee($(this).find('option:selected').attr('fee'));
    });

    function getFee(fee = 0) {
        var tt = $("#tt").attr('tt');
    
        $(".fee").html(parseInt(fee).toLocaleString('en-US'));
        $("#fee-order").val(parseInt(fee));
        $("#tt_all").html((parseInt(tt) + parseInt(fee)).toLocaleString('en-US'));
    }

    $(document).on('change', '#ad_cd', function() {
        getAddress($(this).find('option:selected').attr('address'));
    });

    function getAddress(Address) {
        $("#address").val(Address);
    }
  
   $('input, select,textarea').tooltipster({
       trigger: 'custom',
       onlyOne: false,
       position: 'right',
       theme: 'tooltipster-light'
     });
  
      $("#form").validate({
          errorPlacement: function (error, element) {
              var lastError = $(element).data('lastError'),
                  newError = $(error).text();
  
              $(element).data('lastError', newError);
  
              if(newError !== '' && newError !== lastError){
                  $(element).tooltipster('content', newError);
                  $(element).tooltipster('show');
              }
          },
          success: function (label, element) {
              $(element).tooltipster('hide');
          }
      });
  
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');
  
  allWells.hide();
  
  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
          $item = $(this);
  
      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          $('input, select,textarea').tooltipster("hide");
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });
  
  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input"),
          isValid = true;

      for(var i=0; i<curInputs.length; i++){
          if (!$(curInputs[i]).valid()){
              isValid = false;
          }
      }
  
      if (isValid){
        nextStepWizard.removeClass('disabled').trigger('click');    
      }
  });
  
  $('div.setup-panel div a.btn-primary').trigger('click');
  
});