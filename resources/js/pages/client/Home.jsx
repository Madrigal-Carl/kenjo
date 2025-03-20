import ClientDefault from '../../layouts/client/Default'
import Product from './Product'

const Home = () => {
    return (
        <>
            <Product />
        </>
    )
}

Home.layout = page => <ClientDefault>{page}</ClientDefault>

export default Home
