"use sctrict"

class Player{
    constructor(){
        this.songs=document.querySelectorAll('.song__list')
        this.slider=document.querySelector('.player__range')
        this.currentPlaying=null
        this.playlist=[]

        //AUDIO PLAYER AND CONTROLLERS
        this.audioPlayer=document.querySelector('#audio__player')
        this.playButton=document.querySelector('.player__play')
        this.minValue=document.querySelector('.player__timer-min')
        this.maxValue=document.querySelector('.player__timer-max')
        this.volume=document.querySelector('.player__volume-range')

        //PLAY BUTTON
        this.playAlbum=document.querySelector('.music__banner--btn')
        
        this.nextMusic=document.querySelector('.player__button--next')
        this.previousMusic=document.querySelector('.player__button--previous')

        //PLAYER STATE
        this.playing=false
        this.mute=false
        this.start()
    }

    start(){
        this.songs.forEach(song=>{
            this.playlist.push(song)

            const icon=song.querySelector('.song__list-icon')
            song.addEventListener('mouseover',()=>{
                icon.classList.replace('ti-music','ti-control-play')
            })

            song.addEventListener('mouseout',()=>{
                icon.classList.replace('ti-control-play','ti-music')
            })

            song.addEventListener('click',()=>{              
                this.makeCurrentPlaying(song)  
            })
        })

        this.playButton.addEventListener('click', ()=>{

            if(this.playing){
                this.pauseAudio()
                this.playButton.classList.replace('ti-control-pause','ti-control-play')
            }else{
                this.playContinue()
                this.playButton.classList.replace('ti-control-play','ti-control-pause')
            }
        })

        if(this.playAlbum!=null){
            this.playAlbum.addEventListener('click',()=>{
                this.makeCurrentPlaying(this.playlist[0])
            })
        }


        this.nextMusic.addEventListener('click',()=>{
            if(this.currentPlaying!==null && this.playlist.length>0){
                const total=this.playlist.length
                let currentIndex=this.playlist.indexOf(this.currentPlaying)
               
                if(currentIndex+1>=total){
                    currentIndex=0
                }else{
                    currentIndex++
                }

                this.makeCurrentPlaying(this.playlist[currentIndex])
            }
        })

        this.previousMusic.addEventListener('click',()=>{
            if(this.currentPlaying!==null && this.playlist.length>0){
                const total=this.playlist.length
                let currentIndex=this.playlist.indexOf(this.currentPlaying)
               
                if(currentIndex-1<0){
                    currentIndex=total-1
                }else{
                    currentIndex--
                }

                this.makeCurrentPlaying(this.playlist[currentIndex])
            }
        })

    }

    playAudio(){

        if(this.playing){
            this.audioPlayer.currentTime=0
           
        }else{
            this.playing=!this.playing           
        }

        let max

        //AUDIO MAX VALUE
        this.audioPlayer.addEventListener('loadeddata',()=>{
            max=Math.floor(this.audioPlayer.duration)
            this.slider.max=max
            const maxMinutes=Math.floor(max/60);
            const maxSeconds=max % 60;
            this.maxValue.textContent= maxMinutes + ':' + maxSeconds     
            this.slider.min=0    
        })      
  
        this.slider.addEventListener('input',(e)=>{
            this.minValue.textContent=e.target.value
        })

        if(this.playing){           
            this.audioPlayer.play()

        }else{
            this.audioPlayer.pause()
        }
                    
        if(!this.audioPlayer.paused){
            this.playButton.classList.replace('ti-control-play','ti-control-pause')
            
        }else{
            this.playButton.classList.replace('ti-control-pause','ti-control-play')
        }

        //Update timer
        this.audioPlayer.addEventListener('timeupdate',()=>{
            const current=(Math.floor(this.audioPlayer.currentTime))
            const minutes=Math.floor(current/60);
            let seconds=current % 60
            seconds=(seconds>9)?seconds:"0"+seconds                
            this.minValue.textContent=minutes+':'+seconds

            //UPDATE SLIDER BACKGROUND
            this.slider.value=this.audioPlayer.currentTime
            const percentage=(this.audioPlayer.currentTime/max)*100
            const background=`linear-gradient(90deg, #1abc9c 0%, #1abc9c ${percentage}%, white ${percentage}%, white 100%)`
            this.slider.style.background=background
        })

        this.slider.addEventListener('input',(e)=>{
            this.audioPlayer.currentTime=e.target.value
            console.log((e.target.value/max)*100)
        })

        //UPDATE VOLUME
        this.volume.addEventListener('input',(e)=>{
            this.audioPlayer.volume=e.target.value
        }) 

        this.audioPlayer.addEventListener('ended',()=>{
            const total=this.playlist.length
            let currentIndex=this.playlist.indexOf(this.currentPlaying)
           
            if(currentIndex+1>=total){
                currentIndex=0
            }else{
                currentIndex++
            }
            
            this.makeCurrentPlaying(this.playlist[currentIndex])
        })
    }

    pauseAudio(){
        this.audioPlayer.pause()
        this.playing=false
    }

    playContinue(){
        this.audioPlayer.play()
        this.playing=true
    }

    makeCurrentPlaying(song){

        if(!song.classList.contains('song__list--active')){
            song.classList.add('song__list--active')
        }
        this.currentPlaying=song

        this.songs.forEach((element)=>{
            if(element!==song){
                if(element.classList.contains('song__list--active')){
                    element.classList.remove('song__list--active')
                }
            }
        })

        const audio=song.getAttribute('data-music')
        this.audioPlayer.setAttribute('src','/music/app/storage/uploads/albums/'+audio)
        
        this.playAudio()    
    }


}