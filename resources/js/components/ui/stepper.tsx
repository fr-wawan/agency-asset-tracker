interface StepperProps {
    current: number;
    steps: string[];
}

export function Stepper({ current, steps }: StepperProps) {
    return (
        <div className="flex items-center w-full mb-6">
            {steps.map((step, i) => (
                <div key={step} className="flex items-center flex-1 last:flex-none">
                    <div className="flex flex-col items-center gap-1.5">
                        <div className={`w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium transition-colors
                            ${i < current ? 'bg-primary text-primary-foreground' : ''}
                            ${i === current ? 'border-2 border-primary text-primary bg-background' : ''}
                            ${i > current ? 'border-2 border-muted text-muted-foreground bg-background' : ''}
                        `}>
                            {i < current ? (
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M2 7l3.5 3.5L12 3" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" />
                                </svg>
                            ) : i + 1}
                        </div>
                        <span className={`text-xs whitespace-nowrap
                            ${i === current ? 'text-foreground font-medium' : 'text-muted-foreground'}
                        `}>
                            {step}
                        </span>
                    </div>
                    {i < steps.length - 1 && (
                        <div className={`h-px flex-1 mx-3 mb-5 ${i < current ? 'bg-primary' : 'bg-border'}`} />
                    )}
                </div>
            ))}
        </div>
    );
}
