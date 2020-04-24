import Errors from './Errors'

export default class Form {

	constructor(data) {

		this.originalData = data;

		for (let field in data){
			this[field] = data[field];
		}

		this.errors = new Errors();

	}

	/**
	 * Resets the form
	 * @return {[type]}
	 */
	reset() {

		for (let field in this.originalData){
			this[field] = '';
		}

		// (7) This should be here - not in onSuccess.
		this.errors.clear();

	}

	/**
	 * Gets only needed data for sending
	 * @return {[type]}
	 */
	data() {

		// (8) Cleaning of this version of method. Now we will loop through
		// the fields of the original data and assign these values to the object to return

		let data = {};

		for(let property in this.originalData){
			// (8+) will have data.title = this.title & so on..
			data[property] = this[property];
		}

		return data;

	}

	/**
	 * Helper for post request
	 * @param  {[type]}
	 * @return {[type]}
	 */
	post(url) {
		return this.submit('POST', url);
	}

	/**
	 * Submits the request of form
	 * @requestType {string}
	 * @url  		{string}
	 * @return 		{[type]}
	 */
	async submit(requestType, url) {

		// return new Promise((resolve, reject) => {

            const response = await fetch(url, {
                method: requestType,
                cache: 'no-cache',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(this.data())
            }).then(response => {
                this.onSuccess(response.json())
                resolve(response.json())
            }).catch(error => {
                this.onFail(error.response)
                reject(error.response)
            });

            return response.json()


            // await fetch(url)
            //     .then(response => {
            //         this.onSuccess(response.data);
            //         resolve(response);
            //     })
            //     .catch(error => {
			// 		this.onFail(error.response);
			// 		reject(error.response);
			// 	});

			// axios
			// 	[requestType](url,this.data())
			// 	.then(response => {
			// 		this.onSuccess(response.data);
			// 		resolve(response);
			// 	})
			// 	.catch(error => {
			// 		this.onFail(error.response);
			// 		reject(error.response);
			// 	});

		// });

	}

	/**
	 * Action on success
	 * @param  {[type]}
	 * @return {[type]}
	 */
	onSuccess(data) {

		console.log(data.message);

		this.reset();

	}

	/**
	 * Action on fail
	 * @param  {[type]}
	 * @return {[type]}
	 */
	onFail(errorResponse) {

		 this.errors.record(errorResponse.data.errors)

	}

}
