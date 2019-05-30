class NewMusic{
    constructor(){
        this.button=document.querySelector('#add_song')
        this.submit_button=document.querySelector('.add_new_button')
        this.form=document.querySelector('.dashboard__form')
        this.artists=[]
        this.count=0;
        this.event()
    }

    event(){
       fetch('/music/admin/get_all_artists.php').then(response=>{
           return response.json()
       }).then(data=>{
           this.artists=data
           if(this.artists.length>0){
                this.artists=data
                
                this.addMusic()
           }
       })
    }

    addMusic(){
        this.button.addEventListener('click',()=>{
            this.count++
            let input=`<div class="col-lg-4">
               <div class="row">
                <div class="col-12 mt-5">
                     <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Music Title</label>
                        <input class="form-control" name="title[${this.count}]" type="text" placeholder="Published year"id="example-text-input" required>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="row">
                  <div class="col-12 mt-5">
                     <div class="form-group">
                     <label class="col-form-label">Select a Artist</label>
                        <select class="form-control" name="artist[${this.count}]">
                        ${this.artists.map(artist=>{
                           return "<option value='"+artist.id+"'>"+artist.name+"</option>"
                        })}
                              
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="row">
                  <div class="col-12 mt-5">
                     <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Upload Music</label>
                        <input class="form-control" name="song[${this.count}]" type="file" placeholder="Upload music" required>
                     </div>
                  </div>
               </div>
            </div>`;
            let div=document.createElement('div')
            div.setAttribute('class','row add-music')
            div.innerHTML=input

            this.form.insertBefore(div,this.submit_button)
        }) 
        
        
    }
}

new NewMusic()