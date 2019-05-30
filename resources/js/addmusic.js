class AddMusic{
    constructor(){
        this.form=document.querySelector('.dashboard__form');
        this.button=document.querySelector('.dashboard__form-button');
        this.submitButton=document.querySelector('#submit-music')
        this.addNew=document.querySelector('#add-new-button');
        this.event();
        this.songCount=0;
    }
    event(){
        this.button.addEventListener('click',()=>{
            this.songCount++

            if(this.songCount>0){
                this.submitButton.style.display="block";
            }
           let input=`<label class="dashboard__form-label">Song Title : </label>
            <input type="text" class="dashboard__form-input" name="title[${this.songCount}]" required placeholder="song title">
            <input type="file" class="dashboard__form-input" name="song[${this.songCount}]" required>
            `;
            
            let div=document.createElement('div');
            div.setAttribute('class','dashboard__form-control')
            div.innerHTML=input;
            this.form.insertBefore(div,this.addNew)
            //this.form.appendChild(div)

        })
    }

}

new AddMusic();