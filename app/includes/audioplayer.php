<div class="player">
    <div class="player__controller">
        <div class="player__top">
            <span class="ti-control-skip-backward player__button player__button--previous"></span>
            <span class="ti-control-play player__play player__button"></span>
            <span class="ti-control-skip-forward player__button player__button--next"></span>
            <span class="ti-volume player__button player__button--volume">
                <input type="range" name="volume" class="player__volume-range" min=0 max=1 step=.1 value=1>
            </span>
            
        </div>
        <div class="player__bottom">
            <span class="player__timer player__timer-min">0:00</span><input type="range" name="name" class="player__range" step=1 min=0 max=100 value="0"><span class="player__timer player__timer-max">0:00</span>
        </div>

        <audio id="audio__player">
            <source src="" type="audio/ogg" class="source" preload="metadata">
            <!--<source src="horse.ogg" type="audio/ogg">-->
           <!--<source src="./../app/storage/uploads/albums/album_8/Lahana Le Jurayo ki  लहनाले जुरायो कि  Golden Jublee  Theme Song  DARPAN CHHAYA 2.mp3" type="audio/mpeg">-->
            Your browser does not support the audio element.
        </audio>
    </div>
</div>