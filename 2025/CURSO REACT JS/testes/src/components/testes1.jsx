import Cookies from 'js-cookie';
import {useState, useEffect} from 'react';

const useAuthToken = () => {
  const [token, setToken] = useState(null);

  useEffect(() => {                                  //Para checar se existe o cookie salvo
    const savedToken = Cookies.get('authToken');
    if (savedToken) {
      setToken(savedToken);
    }
  }, []);

  const saveToken = (newToken) => {
    Cookies.set('authToken', newToken, { 
      expires: 7,
      secure: true,                           // apenas HTTPS
      sameSite: 'strict',                     // proteção CSRF
      httpOnly: true                          // para cookies sensíveis (configurado no backend)
    });
    setToken(newToken);
  };

  const removeToken = () => {
    Cookies.remove('authToken');
    setToken(null);
  };

  return { token, saveToken, removeToken };
};

export default function Testes1() {

  const { token, saveToken, removeToken } = useAuthToken();

  return (
    <div>
      {token ? (
        <button onClick={removeToken}>Logout</button>
      ) : (
        <button onClick={() => saveToken('novo_token')}>Login</button>
      )}
    </div>
  )

}