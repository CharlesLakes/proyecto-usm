import asyncio
import websockets
import json
import Controller
import Models


"""
Las rutas de el websocket con el controlador correspondiente
"""

rutas = {
    '/notificaciones':Controller.notificaciones
}

"""
Los usuarios conectados en el webscoket
"""

users = {}

async def main(websocket,path):
    """
    Se reciben las crendenciales de el websocket.
    Se crea la instacia de el usuario y luego se validan las credenciales
    Si este es correcto se inscibe en los usuarios conectados

    Si hay un error en el formato de el json se pasa a la execpt
    """
    login_data = await websocket.recv() 
    try:
        login_data = json.loads(login_data) 
        user = Models.User(login_data["id"],login_data["token"],websocket) 
        if user.login_and_validate(): 
            users[user.id] = user
            print(user.user["username"],"logeado...")
        else:
            await websocket.send(json.dumps({
                {
                    "message":"Credenciales erroneas"
                }
            }))
            return
    except:
        await websocket.send(json.dumps({
            {
                "message":"Error al logear"
            }
        }))
        return 

    """
        Se busca la ruta solicituada por el cliente y se conecta al controlador correspondiente
    """
    for r_path in rutas:
        if r_path == path:
            await rutas[r_path](websocket,user,users)
            return
    
    

    
start_server = websockets.serve(main, "localhost", 6789)

asyncio.get_event_loop().run_until_complete(start_server)
asyncio.get_event_loop().run_forever()