import { Link, useForm } from '@inertiajs/inertia-react'
import React from 'react'
import Auth from '../../Layouts/Auth'

export default function Login({ errors }) {
    const { data, setData, post } = useForm({
        email: '', password: '', remember: '',
    })

    const changeHandler = (e) => setData({ ...data, [e.target.id]: e.target.value })

    const submitHandler = (e) => {
        e.preventDefault()
        post(route('login'), data);
    }
    return (
        <>
            <div className='w-full flex flex-col items-center justify-center content-center'>
                <div className='w-[90%] h-[62vh] mb-[-7em]  '>
                    <img src='https://tlgur.com/d/G7BE6968' alt='fuji japan' className='w-full h-full object-cover rounded-xl' />
                </div>

                <form role="form" onSubmit={submitHandler} noValidate className='flex z-10 flex-col items-center justify-center content-center p-[1.3em] py-10 bg-ago rounded-lg w-[90%] mb-10 shadow-none sm:shadow-lg sm:w-[30em]'>

                    <div className="form-control w-full mb-2 max-w-xs flex flex-col " >
                        <h2 className='text-main text-2xl font-extrabold'>Welcome Back !</h2>
                        <i className='text-main text-sm'>Fill all blanks and submit.</i>
                    </div>
                    <div className="form-control w-full max-w-xs" >
                        <label className="label">
                            <span className="label-text text-drk">What is your email?</span>
                        </label>
                        <input value={data.email} onChange={changeHandler} name='email' id='email' type="email" placeholder="user@example.com" className="input input-primary text-drk input-bordered w-full max-w-xs" />
                        <label className="label">
                            <span className="label-text-alt  text-error">{errors && errors.email}</span>
                        </label>
                    </div>

                    <div className="form-control w-full max-w-xs">
                        <label className="label">
                            <span className="label-text text-drk">Your password?</span>
                        </label>
                        <input value={data.password} onChange={changeHandler} name='password' id='password' type="password" placeholder="*******" className="input input-primary text-drk input-bordered w-full max-w-xs" />
                        <label className="label">
                            <span className="label-text-alt text-error">{errors && errors.password}</span>
                        </label>
                    </div>

                    <div className="form-control w-full max-w-xs">
                        <label className="label cursor-pointer">
                            <span className="label-text text-drk">Remember me</span>
                            <input value={data.remember} onChange={(e) => setData({ ...data, remember: e.target.checked })} name='remember' id='remember rememberMe' type="checkbox" className="checkbox checkbox-primary" />
                        </label>
                    </div>
                    <div className="form-control mt-6 w-full max-w-xs">
                        <button type="submit" className="btn btn-primary w-fit">Submit</button>
                    </div>
                    <div className="form-control w-full max-w-xs mt-2">
                        <div className='text-main text-sm italic'>Don't have account yet, <Link className='text-white hover:text-main' href={route('register')} >Register</Link> now!</div>
                    </div>

                </form>

            </div>
        </>
    )
}
Login.layout = (page) => <Auth children={page} title={"Login"} />
