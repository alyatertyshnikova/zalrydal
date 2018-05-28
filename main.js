var ext = ".mp3";
var audio;
var countryButton;
var year;
audio.onended = function () {
    playMusic(countryButton)
};

function check_button(element) {
    var genre = getGenre();
    year = document.getElementById("years");
    $.ajax({
        type: "POST",
        url: "get_music.php",
        data: {year: year.value, country: element.id, genre: genre},
        success: function (result) {
            if (JSON.parse(result) == null)
            {
                element.style.visibility = "hidden";
            } else
            {
                element.style.visibility = "visible";
            }
        }
    })
    
}

var videoPlayer;
var video;
var playButton;
function buttons() {
    videoPlayer = document.getElementById("videoPlayer");
    video = document.getElementById("video");
    playButton = document.getElementById("play");
    audio = new Audio();
    var countries = document.getElementsByName("country");
    var countries_array = Array.prototype.slice.call(countries);
    countries_array.forEach(check_button);
    //var max = countries.length;
    //alert(max);

}

function playOrPause() {
    if (audio.src == "") {
        if (videoPlayer.style.visibility !== "visible") {
            videoPlayer.style.visibility = "visible";
            video.play();
        } else {
            video.pause();
            video.currentTime = 0;
            videoPlayer.style.visibility = "hidden";
        }
    } else {
        if (audio.paused) {
            playButton.style.visibility = "visible";
            audio.play();
        } else {
            playButton.style.visibility = "hidden";
            audio.pause();
        }
    }
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function playMusic(arg) {
    countryButton = arg;
    var genre = getGenre();
    var country = arg.id;
    $.ajax({
        type: "POST",
        url: "get_music.php",
        data: {year: year.value, country: country, genre: genre},
        success: function (result) {
            if (result !== false)
            {
                var track = JSON.parse(result);
                var path = "music/audio/" + track[0];
                if (audio != null) {
                    audio.pause();
                }
                audio.src = path;
                playButton.style.visibility = "visible";
                audio.play();
                var songName = document.getElementById("songName");
                songName.textContent = track[1] + " - " + track[2];
            } else
            {
                alert("Sorry, there was no music in this country this year :(");
            }
        }
    });
    document.write(track[1] + " - " + track[2]);
}

function getGenre() {
    var chosenGenre = null;
    var genriesId = ["classic", "folk", "rap", "rock", "pop", "jazz"];
    genriesId.forEach(item => {
        if (document.getElementById(item).style.left == "5px") {
            chosenGenre = item;
        }
    });
    return chosenGenre;
}

function changePosition(arg) {
    var chosenGenre = getGenre();
    var genriesId = ["classic", "folk", "rap", "rock", "pop", "jazz"];
    genriesId.forEach(item => document.getElementById(item).style.left = "-23px");
    genre = arg.closest('div');
    (chosenGenre == genre.id) ? genre.style.left = "-23px" : genre.style.left = "5px";
    buttons();
}


