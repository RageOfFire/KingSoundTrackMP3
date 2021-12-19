// Định dạng thời gian cho nhạc
const formatTime = time => {
  const hours = Math.floor(time / 3600);
  const remainder = time % 3600;
  const minutes = Math.floor(remainder / 60);
  const seconds = Math.floor(remainder % 60);

  const hh = hours.toString().padStart(2, '0');
  const mm = minutes.toString().padStart(2, '0');
  const ss = seconds.toString().padStart(2, '0');

  return `${hh}:${mm}:${ss}`;
}
// Nút chơi nhạc
const playerButton = document.querySelector('#playBtn');
      audio = document.querySelector('#music');
      playIcon = '<i class="far fa-play-circle"></i>';
      pauseIcon = '<i class="far fa-pause-circle"></i>';
      function toggleAudio () {
        if (audio.paused) {
          audio.play();
          playerButton.innerHTML = pauseIcon;
        }
        else {
          audio.pause();
          playerButton.innerHTML = playIcon;
        }
      }
      playerButton.addEventListener('click', toggleAudio);
// Khi nhạc kết thúc
      function audioEnded() {
        playerButton.innerHTML = playIcon;
      }
      audio.onended = audioEnded;
// Thực hiện chuyển bài hát
Musiclist = document.getElementsByClassName('music-item').length;
NextButton = document.querySelector('#nextBtn');
PreviousButton = document.querySelector('#previousBtn');
// Lùi lại
function PrevMusic () {
  Musiclist--;
  if (Musiclist < 0) {
    Musiclist - 1;
  }
}
// Hiện thời gian
audio.addEventListener('timeupdate',function(){
    const currentTime = audio.currentTime;
    const durationTime = audio.duration;
    document.getElementById('currentTime').innerHTML = (formatTime(currentTime));
    document.getElementById('Duration').innerHTML = (formatTime(durationTime));
},false);
// Thời gian trên thanh input range
      const timeline = document.querySelector('#time');
      function changeTimelinePosition () {
        const percentagePosition = (100*audio.currentTime) / audio.duration;
        timeline.value = percentagePosition;
      }
      audio.ontimeupdate = changeTimelinePosition;
      function changeSeek () {
        const time = (timeline.value * audio.duration) / 100;
        audio.currentTime = time;
      }
      timeline.addEventListener('change', changeSeek);
// Khi tua nhạc
time.onchange = function (rewind) {
  const seekTime = audio.duration / 100 * rewind.target.value;
  audio.currentTime = seekTime;
} 
// Tắt/mở volume
      const soundButton = document.querySelector('#volumeBtn');
      soundIcon = '<i class="fas fa-volume-up"></i>';
      muteIcon = '<i class="fas fa-volume-mute"></i>';
      function toggleSound () {
        if(audio.muted) {
          audio.muted = false;
          soundButton.innerHTML = soundIcon;
        }
        else {
          audio.muted = true;
          soundButton.innerHTML = muteIcon;
        }
      }
      soundButton.addEventListener('click', toggleSound);
// Điều chỉnh volume
const volume = document.querySelector('#volume');
volume.onchange = function (volumeChange) {
  const seekVolume = volumeChange.target.value / 100;
  audio.volume = seekVolume;
}