"use strict";

class GetMusic{
    
    constructor(){
        this.musicContianer=
        this.container=document.querySelector('.music__lists')
        this.id=document.querySelector('.music').getAttribute('data-id')
       
    }

    getMusicLists(dataClass){
        switch(dataClass){
            case 'album':
                const url= './../admin/api/get_music_by_album.php?id='+this.id
                this.fetchMusic(url)
            break
        }
    }

    fetchMusic(url){
        fetch(url).then(response=>{
            return response.json()
        }).then(data=>{
            if(data){
                console.log(data)
                this.displayMusic(data)
            }

        })
    }

    displayMusic(musics){
       
        musics.forEach(music => {
            console.log(music)
            let html=`<div>
                            <i class="ti-music song__list-icon"></i>
                            <span class="song__list-name">${music.song_name}</span>
                            <div class="song__detail">
                                <a href="./single_artist.php?id=${music.artist_id}"><span class="song__artist">${music.artist_name}</a></span>
                            </div>
                        </div>
                
                        <div class="song__list-menu">
                            <div class="song__list-dots">....</div>
                            
                        </div>`

            const newDiv=document.createElement('div')
            newDiv.setAttribute('class','song__list')
            newDiv.setAttribute('data-music',music.song)

            newDiv.innerHTML=html
            this.container.appendChild(newDiv)
        }); 
    }
}

new GetMusic()