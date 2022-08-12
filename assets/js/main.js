// modal
const buyBtns = document.querySelectorAll('.js-btn-create')
        const modal = document.querySelector('.js-modal')
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close')

        // Hàm hiện thị modal mua về (thêm class open vào close)
        function showByuTicket() {
            modal.classList.add('open')
        }
        // Hàm ẩn modal mua về (gỡ bỏ class open của close)
        function hideByuTicket() {
            modal.classList.remove('open')
        }
        //lập qua từng thẻ button và nghe hành vi click
        for(const buyBtn of buyBtns){
            buyBtn.addEventListener('click', showByuTicket)
        }
        // nghe hành vi click vào button close
            modalClose.addEventListener('click', hideByuTicket)
            modal.addEventListener('click', hideByuTicket)
            modalContainer.addEventListener('click', function (event){
                event.stopPropagation()
        })
