import Navbar from './Navbar'
import Footer from './Footer'

export default function Default({ children }) {
    return (
        <>
            <Navbar />
            <main>
                {children}
            </main>
            <Footer />
        </>

    )
}