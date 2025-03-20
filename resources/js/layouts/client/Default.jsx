import Navbar from './Navbar'
import Footer from './Footer'
import { SearchProvider } from './SearchProvider'

export default function Default({ children }) {
    return (
        <>
            <SearchProvider>
                <Navbar />
                <main>{children}</main>
                <Footer />
            </SearchProvider>)
        </>
    )
}
