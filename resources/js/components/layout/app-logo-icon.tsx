import type { SVGAttributes } from 'react';

export default function AppLogoIcon(props: SVGAttributes<SVGElement>) {
    return (
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth="1.8"
            strokeLinecap="round"
            strokeLinejoin="round"
            {...props}
        >
            <path d="M2 9h7l2 2h11v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9z" />
            <path d="M2 9V7a2 2 0 0 1 2-2h5l2 2" />
            <path d="M8 15h8" />
            <path d="M8 18h5" />
        </svg>
    );
}
