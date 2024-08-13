/**
* v0 by Vercel.
* @see https://v0.dev/t/BvcqOcoKXcT
* Documentation: https://v0.dev/docs#integrating-generated-code-into-your-nextjs-app
*/
import { Button } from "@/components/ui/button"

export default function Component() {
return (
<div className="w-full">
    <img src="/placeholder.svg" width={1200} height={400} alt="Beauty by Lisa Follet"
        className="w-full aspect-[3/1] object-cover" />
    <div className="flex flex-col items-center justify-center min-h-screen p-4 bg-gray-100">
        <div className="w-full max-w-4xl bg-white p-6 shadow-md rounded-md">
            <h1 className="text-2xl font-bold mb-4 text-center">Beauty by Lisa Follet</h1>
            <p className="mb-6 text-center">
                Welcome to Beauty by Lisa Follet, a home-based beauty sanctuary in Hallett Cove! With 20 years of
                industry
                experience across England and Australia, I am dedicated to bringing you the best in beauty therapy. I am
                also an educator in beauty therapy and I combine my expertise and passion for the beauty industry to
                create
                a comfortable and welcoming environment for all my clients. Explore our services and indulge in a
                personalized beauty experience designed just for you.
            </p>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 className="text-xl font-semibold mb-4">Lash & Brow treatments</h2>
                    <ul className="mb-6">
                        <li>Eyelash extensions from $130</li>
                        <li>Lash lift & tint $90</li>
                        <li>Brow lamination $75</li>
                        <li>Eyelash tint $30</li>
                        <li>Eyebrow tint $20</li>
                        <li>Eyebrow wax $25</li>
                    </ul>
                    <h2 className="text-xl font-semibold mb-4">Hair removal</h2>
                    <ul className="mb-6">
                        <li>Body waxing from $25</li>
                        <li>Facial waxing from $15</li>
                    </ul>
                    <h2 className="text-xl font-semibold mb-4">Spray tan</h2>
                    <ul className="mb-6">
                        <li>Full body tan $30</li>
                    </ul>
                </div>
                <div>
                    <h2 className="text-xl font-semibold mb-4">Skincare treatments</h2>
                    <ul className="mb-6">
                        <li>SQT Bio-micro needling $280</li>
                        <li>Ultimate facial - 90 mins $180</li>
                        <li>Classic facial - 60 mins $140</li>
                        <li>Express facial - 30 mins $90</li>
                    </ul>
                    <h2 className="text-xl font-semibold mb-4">Massage treatments</h2>
                    <ul className="mb-6">
                        <li>Heavenly head treatment 60mins $100</li>
                        <li>Heavenly head treatment - 30 mins $45</li>
                        <li>Body massage - 60 mins $100</li>
                        <li>Body massage - 30 mins $65</li>
                    </ul>
                    <h2 className="text-xl font-semibold mb-4">Foot treatments</h2>
                    <ul className="mb-6">
                        <li>Pedicure $75</li>
                        <li>Reflexology for relaxation $40</li>
                    </ul>
                </div>
            </div>
            <div className="flex justify-center mt-6">
                <Button className="px-4 py-2">
                    <a href="#" target="_blank" rel="noopener noreferrer">
                        Book Now on Fresha
                    </a>
                </Button>
            </div>
        </div>
    </div>
</div>
)
}