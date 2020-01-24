    
    
    var modal = document.querySelector(".modal");
    var trigger = document.querySelector("#button-5");
    var closeButton = document.querySelector(".close-button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick); 

    /* ############################################################## */

    var modal1 = document.querySelector(".modal1");
    var trigger1 = document.querySelector("#button-2");
    var closeButton1 = document.querySelector(".close-button1");

    function toggleModal1() {
        modal1.classList.toggle("show-modal1");
    }

    function windowOnClick1(event1) {
        if (event1.target === modal1) {
            toggleModal1();
        }
    }

    trigger1.addEventListener("click", toggleModal1);
    closeButton1.addEventListener("click", toggleModal1);
    window.addEventListener("click", windowOnClick1); 

    /* ############################################################## */

    var modal2 = document.querySelector(".modal2");
    var trigger2 = document.querySelector("#button-3");
    var closeButton2 = document.querySelector(".close-button2");

    function toggleModal2() {
        modal2.classList.toggle("show-modal2");
    }

    function windowOnClick2(event2) {
        if (event2.target === modal2) {
            toggleModal2();
        }
    }

    trigger2.addEventListener("click", toggleModal2);
    closeButton2.addEventListener("click", toggleModal2);
    window.addEventListener("click", windowOnClick2);


    /* ############################################################## */

    var modal3 = document.querySelector(".modal3");
        var trigger3 = document.querySelector("#button-6");
        var closeButton3 = document.querySelector(".close-button3");

        function toggleModal3() {
            modal3.classList.toggle("show-modal3");
        }

        function windowOnClick3(event3) {
            if (event3.target === modal3) {
                toggleModal3();
            }
        }

        trigger3.addEventListener("click", toggleModal3);
        closeButton3.addEventListener("click", toggleModal3);
        window.addEventListener("click", windowOnClick3);