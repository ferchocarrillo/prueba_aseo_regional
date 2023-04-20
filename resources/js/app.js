import './bootstrap';
import "../sass/app.scss";

import * as bootstrap from "bootstrap";

import jQuery from "jquery";
window.$ = jQuery;

import DataTable from "datatables.net-bs5";
DataTable(window, window.$);

import Swal from "sweetalert2";
//De aquí en adelante definir las alertas
window.successAlert = function (){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your post has been saved',
        showConfirmButton: false,
        timer: 1900
    })
