async function postJson(route, data, methods, _token){

    let response = await fetch(route, {
        method: methods,
        headers:{
            'Content-type':'application/json;charset=utf-8'
        },
        body: JSON.stringify({
            data,
            _token,
        })
    })
    return await response.json()
}
