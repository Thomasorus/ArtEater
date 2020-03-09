<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`. * 
 * This default template must not be removed. It is used whenever Kirby cannot find a template with the name of the content file.
 * Snippets like the header, footer and intro contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>
<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>

  <div class="post podcast-box">


    <audio id="player" src="<?= $page->podcast() ?>"></audio>



    <div class="player-wrapper">
      <div class="player__left-block">
        <div class="player-controls">
          <div class="player-controls__play-time">
            <button id="playButton" class="player-controls__play-button">
              <div id="playText" class="play-icon" aria-label="Play this audio file"></div>
            </button>
            <div class="player-controls__time">
              <span tabindex="0" id="currentTime">00:00</span>&#8239;/&#8239;<span tabindex="0"
                id="totalTime">00:00</span>
            </div>

          </div>
          <button id="backButton" class="player-controls__navigation-button player-controls__navigation-button--left">
            <div class="back-icon" aria-label="Back thirty seconds"></div>
          </button>
          <button id="changeSpeed" class="player-controls__speed-button" type="button">speed: × <span
              id="showSpeed">1</span></button>

          <button id="forwardButton"
            class="player-controls__navigation-button player-controls__navigation-button--right">
            <div class="forward-icon" aria-label="Forward thirty seconds"></div>
          </button>
          <div class="player-controls__volume">
            <input type="radio" name="volume" value="0.1" id="vol10" class="accessi" />
            <label for="vol10">
              <span class="accessi">Volume Level 10/100</span>
            </label>
            <input type="radio" name="volume" value="0.2" id="vol20" class="accessi" />
            <label for="vol20">
              <span class="accessi">Volume Level 20/100</span>
            </label>
            <input type="radio" name="volume" value="0.3" id="vol30" class="accessi" />
            <label for="vol30">
              <span class="accessi">Volume Level 30/100</span>
            </label>
            <input type="radio" name="volume" value="0.4" id="vol40" class="accessi" />
            <label for="vol40">
              <span class="accessi">Volume Level 40/100</span>
            </label>
            <input type="radio" name="volume" value="0.5" id="vol50" class="accessi" />
            <label for="vol50">
              <span class="accessi">Volume Level 50/100</span>
            </label>
            <input type="radio" name="volume" value="0.6" id="vol60" class="accessi" />
            <label for="vol60">
              <span class="accessi">Volume Level 60/100</span>
            </label>
            <input type="radio" name="volume" value="0.7" id="vol70" class="accessi" />
            <label for="vol70">
              <span class="accessi">Volume Level 70/100</span>
            </label>
            <input type="radio" name="volume" value="0.8" id="vol80" class="accessi" />
            <label for="vol80">
              <span class="accessi">Volume Level 80/100</span>
            </label>
            <input defaultChecked type="radio" name="volume" value="0.9" id="vol90" class="accessi" />
            <label for="vol90">
              <span class="accessi">Volume Level 90/100</span>
            </label>
            <input type="radio" name="volume" value="1" id="vol100" class="accessi" />
            <label for="vol100">
              <span class="accessi">Volume Level 100/100</span>
            </label>



          </div>
        </div>
        <img class="podcast-banner" src="/assets/art-eaterpodcast.jpg" alt="Art Eater Podcast Logo">

      </div>

      <div class="player__right-block">
        <?= $page->text()->kt() ?>
      </div>
          <progress id="seekBar" value="0" max="1"></progress>

    </div>



</main>

<?php snippet('footer') ?>

<script>
  document.addEventListener("DOMContentLoaded", function (event) {
    var audio = document.querySelector('#player');
    var url = audio.getAttribute('src');
    var filename = url.replace(/^.*[\\\/]/, '');

    var currentTime = document.querySelector('#currentTime');
    var totalTime = document.querySelector('#totalTime');
    var changeSpeed = document.querySelector('#changeSpeed');
    var showSpeed = document.querySelector("#showSpeed");
    var changeVolume = document.querySelectorAll('input.accessi');
    var playButton = document.querySelector("#playButton");
    var playText = document.querySelector("#playText");
    var backbutton = document.querySelector("#backButton");
    var resetButton = document.querySelector("#resetButton");
    var forwardbutton = document.querySelector("#forwardButton");
    var progressBar = document.querySelector('#seekBar');

    // Resume play from saved progress
    var localProgress = localStorage.getItem(filename);
    if (localProgress) {
      audio.currentTime = localProgress;
    }


    // Maximum and minimum play speed
    var playbackRateMax = 2;
    var playbackRateMin = 0.75;
    // A function to change play speed
    function setPlaySpeed() {
      var currentSpeed = audio.playbackRate;
      if (currentSpeed < playbackRateMax) {
        audio.playbackRate = currentSpeed + 0.25;
      } else {
        audio.playbackRate = playbackRateMin;
      }
      showSpeed.innerHTML = audio.playbackRate;
    }

    // A function to set audio volume
    function setVolume(val) {
      audio.volume = val;
    }

    // A function to play audio and insert the pause icon
    function playAudio() {
      if (audio.paused) {
        audio.play();
        playText.setAttribute('class', 'pause-icon');
      }
    }

    // A function to pause audio and insert the play icon
    function pauseAudio() {
      if (!audio.paused) {
        audio.pause();
        playText.setAttribute('class', 'play-icon');
      }
    }

    // A function to play and pause audio
    function togglePlay() {
      if (audio.paused) {
        playAudio();
      } else {
        pauseAudio();
      }
    }

    // A function to start listening from the beginning
    function resetAudio() {
      if (audio.paused) {
        // Don't autostart audio if it was paused, simply go back
        audio.currentTime = 0;
      } else {
        audio.pause();
        audio.currentTime = 0;
        audio.play();
      }
    }

    /*
     * A function to build a callback that will change audio current time.
     * Audio will be forwarded or rewinded of 'seconds' seconds. 'seconds' should be negative to rewind.
     */
    function buildAudioSeeker(seconds) {
      console.log(seconds)
      return function () {
        time = audio.currentTime;
        if (time + seconds < 0) {
          audio.currentTime = 0;
        } else if (time + seconds > audio.duration) {
          audio.currentTime = audio.duration;
        } else {
          audio.currentTime += seconds;
        }
        updateProgress();
      }
    }

    // A function to change the progress bar value on click
    function seekProgressBar(progress) {
      // Get the progress bar % location and add it to the audio current time
      var percent = progress.offsetX / this.offsetWidth;
      audio.currentTime = percent * audio.duration;
      progressBar.value = percent / 100;
      updateProgress();
    }

    // A function to format a duration in seconds to a string 'hh:mm:ss'
    function formatTime(time) {
      var hours = Math.floor(time / 3600);
      var minutes = Math.floor((time - hours * 3600) / 60);
      var seconds = time - hours * 3600 - minutes * 60;
      if (hours < 10) {
        hours = "0" + hours;
      }
      if (minutes < 10) {
        minutes = "0" + minutes;
      }
      seconds = parseInt(seconds, 10);
      if (seconds < 10) {
        seconds = "0" + seconds;
      }
      return hours + ':' + minutes + ':' + seconds;
    }

    /*
     * A callback triggered upon audio progress, progress bar seeking and back/forward buttons.
     * Actualizes both the progress bar and time display.
     */
    function updateProgress() {
      if (audio.currentTime == audio.duration) {
        pauseAudio();
        resetAudio();
      }
      progressBar.value = audio.currentTime / audio.duration;
      currentTime.innerHTML = formatTime(audio.currentTime);
      totalTime.innerHTML = formatTime(audio.duration);

      // Save progress to local storage
      localStorage.setItem(filename, audio.currentTime);
    }

    // Event listener reacting to audio progressing
    audio.addEventListener('timeupdate', updateProgress, false);

    // Event listeners checking for buttons clicks
    changeSpeed.addEventListener('click', setPlaySpeed, false);
    playButton.addEventListener('click', togglePlay, false);
    backButton.addEventListener('click', buildAudioSeeker(-30), false);
    forwardButton.addEventListener('click', buildAudioSeeker(30), false);
    progressBar.addEventListener('click', seekProgressBar, false);

    // Register a click handler per volume section (0%, 10%, ..., 90%, 100%)
    for (var i = 0; i < changeVolume.length; i++) {
      changeVolume[i].addEventListener("click", function () {
        setVolume(this.value);
      });
    }
  });
</script>