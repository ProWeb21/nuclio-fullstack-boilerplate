import React, {useState} from 'react';

const Home = () => {

  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const handleChangeName = (event) => {
    setName(event.target.value);
  }
  const handleChangeEmail = (event) => {
    setEmail(event.target.value);
  }
  const [pinsList, setPinsList] = useState(['']);
  const submitForm = () => {

    const showPins = () => {
      const url = 'http://localhost/api/pins';
      const body = {
        name: name,
        email: email,
      }
      const options = {
        method: 'GET',
        headers: new Headers({
          'Content-type': 'application/json',
        }),
        mode: 'cors',
        body: JSON.stringify(body)
      };
      fetch(url, options)
        .then(response => {
          if (response.status === 200) {
            return response.json();
          }
          return Promise.reject(response.status);
        })
        .then(function (myJson) {
          console.log('listado');
          setPinsList(JSON.stringify(myJson));
        })
        .catch(error => console.log(error));
    };
    console.log(pinsList)
    showPins();

    return (
    
      
      <div>
        <input type="text" value={name} onChange={handleChangeName} />
        <input type="text" value={email} onChange={handleChangeEmail} />
        
      </div>
    )
  }    
};

export default Home;
