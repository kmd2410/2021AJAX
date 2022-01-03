<?
    include_once $_SERVER["DOCUMENT_ROOT"]."/common.php";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<form id="form" name="form" method="post">
    <input type="text" name="name" id="name" placeholder="이름을 입력해주세요" required>
    <button type="button" id="submit">Button</button>
</form>

<script type="text/javascript">
	$("#submit").click(function (event) {         
	    //preventDefault로 submit_go 이벤트를 막음 
	    event.preventDefault();    


        var name = $("#name").val();   

        if(name == '') {

            alert('고객명을 입력해주세요.');

            $("#name").focus();

        } else {
            
		    // Get form         
		    var form = $('#form')[0];
		    // Create an FormData object          
		    var data = new FormData(form);         
		    // disabled the submit_go button         
		    $("#submit").prop("disabled", true);   
		    
		    $.ajax({             
		        type: "POST",          
		        enctype: 'multipart/form-data',  
		        url: 'analysis_insure_update.php',
		        data: data,          
		        processData: false,    
		        contentType: false,      
		        cache: false,           
		        timeout: 600000,  
			
		        beforeSend : function() {  
		                // alert('상담신청이 완료되었습니다.'); // 전송 전 실행 코드

		            },
				
		        success: function (data) { 
					$('body').html(data);
		            alert("접수가 완료 되었습니다.");           
		            $("#submit").prop("disabled", false);  
		            // $("#okModals").hide();
		            // $("#okModals input").val();
		            // location.reload(true); 
		            location.reload(true); 
		        },          
		        error: function (e) {  
		            console.log("ERROR : ", e);     
		            $("#submit").prop("disabled", false);    
		            alert("상담신청에 실패하였습니다. 신청서를 다시확인후 작성해주시기 바랍니다.");      
		            // $("#okModals").hide();
		            // $("#okModals input").val();   
		            location.reload(true); 
		         }   
				
		    });   
	    }
	});     
</script>