function reply_click(clicked_id, data_value) {
    var id = clicked_id;
    var value = data_value;
    var mess = "Bạn có chắc chắn xóa " + id + " ko?";
    if (confirm(mess) == true) {
        window.location.href = "../../del.php?id=" + id +
            "&value=" + value;
    } else {
        return false;
    }
}