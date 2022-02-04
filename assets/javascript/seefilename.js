function getnamefile() {
    const filemp3 = document.getElementById("updateFile").files[0].name;
    document.getElementById("filename").innerHTML = 'Tên file: <i class="fas fa-file-audio"></i> ' + filemp3 + ' <i class="fas fa-file-audio"></i>';
}